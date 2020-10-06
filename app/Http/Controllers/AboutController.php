<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends LayoutController
{
    //
    public function handle()
    {
        return view('about', $this->all);
    }
}
