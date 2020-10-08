<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends LayoutController
{
    //
    public function handle()
    {
        $term = request('search');
        $this->all['products'] = DB::table('products')->where('title', 'LIKE', "%$term%")->get();
        $this->all['current'] = new class
        {
            public $title = "Search";
        };
        // return $this->all;
        return view('search', $this->all);
    }
}
