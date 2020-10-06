<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleController extends LayoutController
{
    //
    public function handle()
    {
        return view('single', $this->all);
    }
}
