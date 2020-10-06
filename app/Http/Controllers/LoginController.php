<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends LayoutController
{
    //
    public function handle()
    {
        return view('login', $this->all);
    }
}
