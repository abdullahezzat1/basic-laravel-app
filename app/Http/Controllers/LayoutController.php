<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    //
    protected $all = [];
    protected $logged_in;

    public function __construct()
    {
        $this->logged_in = session('logged_in');
        $this->setBaseParams();
        $this->loginHandler();
    }

    private function setBaseParams()
    {
        $this->all['categories'] = DB::select("SELECT category_id, name, title FROM categories");
    }

    private function loginHandler()
    {
        if ($this->logged_in) {
            $this->all['logged_in'] = true;
            $this->all['logged_in_username'] = session('logged_in_username');
            $this->all['logged_in_email'] = session('logged_in_email');
        } else {
            $this->all['logged_in'] = false;
        }
    }
}
