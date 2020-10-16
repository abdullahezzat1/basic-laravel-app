<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AccountFormsController extends Controller
{
    //

    public function register()
    {
        $validated = request()->validate([
            'username' => 'required|alpha_num|unique:users,username',
            'email' => 'required|email:rfc|unique:users,email',
            'password' => 'required|between:8,32|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[!@#$%^&*()]/'
            // 'phone' => 'required|numeric|max:12'
        ]);


        DB::insert(
            "INSERT INTO users (username, email, hash, email_verified) VALUES (? , ?, ?, ?)",
            [
                $validated['username'],
                $validated['email'],
                Hash::make($validated['password']),
                false
            ]
        );

        session(['verificationEmail' => $validated['email']]);
        return redirect("/account/send/verification-email");
    }


    public function login()
    {
        $validated = request()->validate([
            'username' => 'required|exists:users,username'
        ]);
        $user = DB::select("SELECT email, email_verified, hash FROM users WHERE username = ?", [$validated['username']])[0];

        if (!$user->email_verified) {
            session(['verificationEmail' => $user->email]);
            return redirect("/account/send/verification-email");
        };

        if (!Hash::check(request('password'), $user->hash)) {
            return redirect('auth')->with('errors', ['Wrong Password']);
        }

        session(["logged_in" => true, "logged_in_username" => $validated['username'], "logged_in_email" => $user->email]);
        return redirect()->route('index');
    }


    public function forgotPassword()
    {
        $validated = request()->validate([
            'email' => 'required|exists:users,email'
        ]);

        session(['forgotPasswordEmail' => $validated['email']]);
        return redirect('account/send/password-reset');
    }


    public function resetPassword()
    {
        $email = session('resetPasswordFor');

        if (!$email) {
            return redirect()->route('index');
        }

        $validated = request()->validate([
            'password' => 'required|between:8,32|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[!@#$%^&*()]/|confirmed',
        ]);



        if (DB::update("UPDATE users SET hash = ? WHERE email = ?", [Hash::make($validated['password']), $email])) {
            Request::session()->flush();
            return redirect('auth')->with('success', ["Password has been reset successfully!"]);
        }

        return back()->with(['errors' => ['An error occured. Please try again']]);
    }
}
