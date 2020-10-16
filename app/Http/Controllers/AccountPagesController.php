<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetEmail;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class AccountPagesController extends LayoutController
{
    //

    public function sendVerificationEmail()
    {
        $email = session('verificationEmail');

        if (!$email) {
            return redirect()->route('index');
        }

        $email_verified = DB::select('SELECT email_verified FROM users WHERE email = ?', [$email])[0]->email_verified;

        if (!$email_verified) {
            //create a token
            $uuid = Str::uuid();
            //store it in DB
            $updated = DB::update("UPDATE users SET verification_token = ? WHERE email = ?", [$uuid, $email]);

            if (!$updated) {
                $this->all['errors'] = new class
                {
                    public function any()
                    {
                        return true;
                    }
                    public function all()
                    {
                        return ['An error occured. Please try again.'];
                    }
                };
                $this->all['additional'] = 'retry';
                return view("one-time-message", $this->all);
            }

            //send an email with verification link to /confirm?token=TOKEN
            Mail::to($email)->queue(new VerificationEmail($uuid));
            $this->all['warning'][] = "A verification link was sent to $email. Please check your email to verify your account";
            $this->all['additional'] = "resendLink";
            return view("one-time-message", $this->all);
        }

        Request::session()->remove('verificationEmail');
        return redirect('auth')->with('errors', ['Email is already verified. You can login now']);
    }




    public function verifyEmail($token)
    {
        if (!$token) {
            return redirect()->route('index');
        }

        Request::session()->remove('verificationEmail');

        $info = DB::select("SELECT email, email_verified FROM users WHERE verification_token = ?", [$token])[0] ?? null;

        if (!$info) {
            return redirect('auth')->with('errors', ["Link expired or invalid!"]);
        }

        if ($info->email_verified) {
            return redirect('auth')->with('success', ["Email is already verified. You can login now."]);
        }


        $success = DB::update("UPDATE users SET email_verified = true WHERE email = ?", [$info->email]);


        if (!$success) {
            $this->all['errors'] = new class
            {
                public function any()
                {
                    return true;
                }
                public function all()
                {
                    return ["An error occured. Please try again."];
                }
            };
            return view('one-time-message', $this->all);
        }

        return redirect('auth')->with('success', ["Email has been verified successfully! You may now login."]);
    }



    public function sendPasswordReset()
    {
        $email = session('forgotPasswordEmail');

        if (!$email) {
            return redirect()->route('index');
        }

        $uuid = Str::uuid();

        $updated = DB::update("UPDATE users SET password_reset_token = ? WHERE email = ?", [$uuid, $email]);

        if (!$updated) {
            $this->all['errors'] = new class
            {
                public function any()
                {
                    return true;
                }
                public function all()
                {
                    return ['An error occured. Please try again.'];
                }
            };
            $this->all['additional'] = 'retry';
            return view("one-time-message", $this->all);
        }

        Mail::to($email)->queue(new PasswordResetEmail($uuid));

        $this->all['warning'][] = "A link was sent to $email. Please check your email to reset your password";
        $this->all['additional'] = "resendLink";
        return view("one-time-message", $this->all);
    }


    public function resetPassword($token)
    {
        if (!$token) {
            return redirect()->route('index');
        }

        Request::session()->remove('forgotPasswordEmail');

        $info = DB::select("SELECT email FROM users WHERE password_reset_token = ?", [$token])[0] ?? null;

        if (!$info) {
            return redirect('auth')->with('errors', ["Link expired or invalid!"]);
        }

        if (is_array(session('errors'))) {
            $this->all['errors'] = new class
            {
                public function any()
                {
                    return true;
                }
                public function all()
                {
                    return session('errors');
                }
            };
        }

        session(['resetPasswordFor' => $info->email]);
        return view('reset-password', $this->all);
    }



    public function logout()
    {
        Request::session()->flush();
        return redirect()->route('index');
    }
}
