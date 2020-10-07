<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SingleController extends LayoutController
{
    //
    public function handle($uuid)
    {
        $this->all['current'] = DB::select("SELECT * FROM products WHERE uuid = ?", [$uuid])[0];
        return view('single', $this->all);
    }
}
