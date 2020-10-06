<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends LayoutController
{
    //
    public function handle()
    {
        return view('payment', $this->all);
    }
}
