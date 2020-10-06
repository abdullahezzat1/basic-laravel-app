<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends LayoutController
{
    //
    public function handle()
    {
        return view('mail', $this->all);
    }
}
