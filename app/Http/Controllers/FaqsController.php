<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqsController extends LayoutController
{
    //
    public function handle()
    {
        return view('faqs', $this->all);
    }
}
