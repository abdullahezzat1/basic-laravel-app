<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FregetablesController extends Controller
{
    //
    public function handle()
    {
        $categories = DB::select("SELECT title, name FROM categories");
        return view('fregetables', ['categories' => $categories]);
    }
}
