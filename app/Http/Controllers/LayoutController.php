<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    //
    protected $all = [];

    public function __construct()
    {
        $this->setBaseParams();
    }

    protected function setBaseParams()
    {
        $this->all['categories'] = DB::select("SELECT category_id, name, title FROM categories");
    }
}
