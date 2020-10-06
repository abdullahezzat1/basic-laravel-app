<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends LayoutController
{
    //
    public function handle()
    {
        return view('privacy', $this->all);
    }
}
