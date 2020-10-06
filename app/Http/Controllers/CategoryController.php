<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends LayoutController
{
    //
    public function handle($name)
    {
        $current = DB::select("SELECT categories.category_id, categories.title, banners.img FROM categories JOIN banners WHERE categories.name = ? AND categories.category_id = banners.category_id", [$name])[0];
        $products = DB::select("SELECT * FROM products WHERE category_id = ?", [$current->category_id]);
        $subsections = DB::select("SELECT title, img FROM subsections WHERE category_id = ?", [$current->category_id]);
        $this->all['current'] = $current;
        $this->all['products'] = $products;
        $this->all['subsections'] = $subsections;
        return view('products', $this->all);
    }
}
