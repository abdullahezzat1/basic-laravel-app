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
        $this->messagesHandler();
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

    public function messagesHandler()
    {
        if (is_array(session('errors'))) {
            $this->all['errors'] = new class
            {
                public function any()
                {
                    return true;
                }
                public function all()
                {
                    return session('errors');
                }
            };
        }

        $success = session('success');
        if (is_array($success)) {
            $this->all['success'] = $success;
        }
    }
}
