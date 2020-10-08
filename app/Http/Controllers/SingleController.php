<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SingleController extends LayoutController
{
    //
    public function handle($uuid)
    {
        $this->all['currentProduct'] = DB::select("SELECT * FROM products WHERE uuid = ?", [$uuid])[0];
        $this->all['currentCategory'] = DB::select("SELECT * FROM categories WHERE category_id = ?", [$this->all['currentProduct']->category_id])[0];
        $this->all['more'] = DB::select("SELECT * FROM products WHERE category_id = ? ORDER BY RAND() LIMIT 4", [$this->all['currentCategory']->category_id]);
        return view('single', $this->all);
    }
}
