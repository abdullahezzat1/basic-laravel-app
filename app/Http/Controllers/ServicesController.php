<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends LayoutController
{
    //
    public function handle()
    {
        return view('services', $this->all);
    }
}
