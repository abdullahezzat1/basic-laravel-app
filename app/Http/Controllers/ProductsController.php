<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends LayoutController
{
    //
    public function handle()
    {
        $products = DB::select("SELECT * FROM products WHERE category_id = ?", [4]);
        $subsections = DB::select("SELECT title, img FROM subsections WHERE category_id = ?", [4]);
        $all['products'] = $products;
        $all['subsections'] = $subsections;
        return view('products', $all);
    }
}
