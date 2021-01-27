<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class AccountPagesController extends LayoutController
{
    //

    public function emailVerificationMessage()
    {
        $this->all['email'] = session('verification-email');
        return view('email-verification-message', $this->all);
    }

    public function verifyEmail($token)
    {
        if (!$token) {
            return redirect()->route('index');
        }


        $info = DB::select("SELECT email, email_verified FROM users WHERE verification_token = ?", [$token])[0] ?? null;

        if (!$info) {
            return redirect('auth')->with('errors', ["Link expired or invalid!"]);
        }

        if ($info->email_verified) {
            Request::session()->remove('verification-email');
            return redirect('auth')->with('success', ["Email is already verified. You can login now."]);
        }


        DB::update("UPDATE users SET email_verified = true WHERE email = ?", [$info->email]);

        Request::session()->remove('verification-email');
        return redirect('auth')->with('success', ["Email has been verified successfully! You may now login."]);
    }


    public function passwordResetEmailMessage()
    {
        $this->all['email'] = session('password-reset-email');
        return view('password-reset-email-message', $this->all);
    }


    public function resetPassword($token)
    {
        if (!$token) {
            return redirect()->route('index');
        }

        $info = DB::select("SELECT email FROM users WHERE password_reset_token = ?", [$token])[0] ?? null;

        if (!$info) {
            return redirect('auth')->with('errors', ["Link expired or invalid!"]);
        }

        session(['reset-password-for' => $info->email]);
        return view('reset-password', $this->all);
    }

    public function logout()
    {
        Request::session()->flush();
        return redirect()->route('index');
    }
}
