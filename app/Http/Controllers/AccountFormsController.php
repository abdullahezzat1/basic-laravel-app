<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetEmail;
use App\Mail\VerificationEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

class AccountFormsController extends LayoutController
{
    //

    private function usernameRegistrationConditions()
    {
        return 'required|min:6|alpha_num|unique:users,username';
    }

    private function emailRegistrationConditions()
    {
        return 'required|email:rfc|unique:users,email';
    }

    private function passwordRegistrationConditions()
    {
        return 'required|between:8,32|confirmed|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[!@#$%^&*()]/';
    }

    public function handleRegistrationForm()
    {
        // validate username, email, and password
        $validated = request()->validate([
            'username' => $this->usernameRegistrationConditions(),
            'email' => $this->emailRegistrationConditions(),
            'password' => $this->passwordRegistrationConditions()
            // 'phone' => 'required|numeric|max:12'
        ]);


        $uuid = Str::uuid();

        // on success: register user data in DB
        DB::insert(
            "INSERT INTO users (username, email, hash, email_verified, password_reset_token) VALUES (? , ?, ?, ?, ?)",
            [
                $validated['username'],
                $validated['email'],
                Hash::make($validated['password']),
                false,
                $uuid
            ]
        );

        // send verification email
        Mail::to($validated['email'])->queue(new VerificationEmail($uuid));

        // redirect with session message
        session(['verification-email' => $validated['email']]);
        return redirect('message/verification-email');
    }


    public function resendVerificationEmail()
    {
        $email = session('verification-email');

        if (!$email) {
            redirect()->route('index');
        }

        $uuid = Str::uuid();

        DB::update("UPDATE users SET verification_token = ? WHERE email = ?", [$uuid, $email]);


        Mail::to($email)->queue(new VerificationEmail($uuid));
        return back()->with(['success' => ["Email resent successfully"]]);
    }


    public function handleLoginForm()
    {
        $validated = request()->validate([
            'username' => 'required|exists:users,username'
        ]);
        $user = DB::select("SELECT email, email_verified, hash FROM users WHERE username = ?", [$validated['username']])[0];

        if (!$user->email_verified) {
            session(['verification-email' => $user->email]);
            return redirect("/message/verification-email");
        };

        if (!Hash::check(request('password'), $user->hash)) {
            return redirect('auth')->with('errors', ['Wrong Password']);
        }

        Request::session()->flush();
        session(["logged_in" => true, "logged_in_username" => $validated['username'], "logged_in_email" => $user->email]);
        return redirect()->route('index');
    }


    public function handleForgotPasswordForm()
    {
        $validated = request()->validate([
            'email' => 'required|exists:users,email'
        ]);

        $uuid = Str::uuid();

        DB::update("UPDATE users SET password_reset_token = ? WHERE email = ?", [$uuid, $validated['email']]);

        Mail::to($validated['email'])->queue(new PasswordResetEmail($uuid));
        session(['password-reset-email' => $validated['email']]);
        return redirect('message/password-reset-email');
    }


    public function resendPasswordResetEmail()
    {
        $email = session('password-reset-email');

        $uuid = Str::uuid();

        DB::update("UPDATE users SET password_reset_token = ? WHERE email = ?", [$uuid, $email]);

        Mail::to($email)->queue(new PasswordResetEmail($uuid));

        return back()->with(['success' => ['Email resent successfully']]);
    }

    public function resetPassword()
    {
        $email = session('reset-password-for');

        if (!$email) {
            return redirect()->route('index');
        }

        $validated = request()->validate([
            'password' => $this->passwordRegistrationConditions(),
        ]);



        if (DB::update("UPDATE users SET hash = ? WHERE email = ?", [Hash::make($validated['password']), $email])) {
            Request::session()->flush();
            return redirect('auth')->with('success', ["Password has been reset successfully!"]);
        }

        return back()->with(['errors' => ['An error occured. Please try again']]);
    }

    public function changeEmail()
    {
        if (!$this->logged_in) {
            return redirect()->route('index');
        }

        if (request("email") === session('logged_in_email')) {
            return back()->with(['errors' => ["This is already your current email."]]);
        }

        $validated = request()->validate([
            'email' => $this->emailRegistrationConditions()
        ]);

        DB::update("UPDATE users SET email = ? WHERE username = ?", [$validated['email'], session('logged_in_username')]);
        session(['logged_in_email' => $validated['email']]);

        return back()->with(['success' => ['Email changed successfully']]);
    }

    public function changePassword()
    {
        if (!$this->logged_in) {
            return redirect()->route('index');
        }

        $validated = request()->validate([
            'password' => $this->passwordRegistrationConditions(),
        ]);

        if (DB::update("UPDATE users SET hash = ? WHERE email = ?", [Hash::make($validated['password']), session('logged_in_email')])) {
            Request::session()->flush();
            return redirect('auth')->with('success', ["Password has been reset successfully!"]);
        }

        return back()->with(['errors' => ['An error occured. Please try again']]);
    }


    public function deleteAccount()
    {
        $username = session('logged_in_username');

        $user = DB::select("SELECT email, email_verified, hash FROM users WHERE username = ?", [$username])[0];

        if (!Hash::check(request('password'), $user->hash)) {
            Request::session()->flush();
            return redirect('auth')->with('errors', ['Wrong Password']);
        }

        DB::delete("DELETE FROM users WHERE username = ?", [$username]);
        Request::session()->flush();
        return redirect()->route('index');
    }
}
