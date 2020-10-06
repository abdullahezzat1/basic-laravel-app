<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends LayoutController
{
    //
    public function handle()
    {
        return view('index', $this->all);
    }
}
