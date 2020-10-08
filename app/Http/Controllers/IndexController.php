<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends LayoutController
{
    //
    public function handle()
    {
        $this->all['hotoffers'] = DB::select("SELECT * FROM products WHERE hotoffer = true");
        return view('index', $this->all);
    }
}
