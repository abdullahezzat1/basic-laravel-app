<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class OtherFormsController extends LayoutController
{
    //

    public function subscribeToNewsletter()
    {
        $validated = request()->validate([
            'email' => 'required|unique:newsletter_emails,email|email:rfc'
        ]);

        DB::insert("INSERT INTO newsletter_emails (email) VALUES (?)", [$validated['email']]);
        return redirect('newsletter/success')->with(['success' => ["Subscribed to newsletter successfully!!"]]);
    }

    public function saveContactMessage()
    {

        $validated = request()->validate([
            'name' => 'required',
            'message' => 'required',
            'subject' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);


        DB::insert(
            'INSERT INTO contact_messages (name, email, telephone, subject, message) VALUES (?, ?, ?, ?, ?)',
            [
                $validated['name'],
                $validated['email'],
                $validated['telephone'],
                $validated['subject'],
                $validated['message']
            ]
        );

        return back()->with(['success' => ["Message received successfully! We will reply to you as soon as possible!"]]);
    }
}
