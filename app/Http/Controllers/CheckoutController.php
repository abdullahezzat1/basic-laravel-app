<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends LayoutController
{
    //
    public function handle()
    {
        return view('checkout', $this->all);
    }
}
