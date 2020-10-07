<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class StaticController extends LayoutController
{
    //
    public function handle($param)
    {
        return view()->exists($param) ? view($param, $this->all) : view('welcome');
    }
}
