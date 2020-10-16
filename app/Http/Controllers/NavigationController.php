<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class NavigationController extends LayoutController
{
    //
    public function index()
    {
        $this->all['hotoffers'] = DB::select("SELECT * FROM products WHERE hotoffer = true");
        return view('index', $this->all);
    }

    public function search()
    {
        $term = request('term');
        $this->all['products'] = DB::table('products')->where('title', 'LIKE', "%$term%")->get();
        $this->all['current'] = new class
        {
            public $title = "Search";
        };
        return view('search', $this->all);
    }


    public function category($name)
    {
        $current = DB::select("SELECT categories.category_id, categories.title, banners.img FROM categories JOIN banners WHERE categories.name = ? AND categories.category_id = banners.category_id", [$name])[0];
        $products = DB::select("SELECT * FROM products WHERE category_id = ?", [$current->category_id]);
        $subsections = DB::select("SELECT title, img FROM subsections WHERE category_id = ?", [$current->category_id]);
        $this->all['current'] = $current;
        $this->all['products'] = $products;
        $this->all['subsections'] = $subsections;
        return view('category', $this->all);
    }


    public function single($uuid)
    {
        $this->all['currentProduct'] = DB::select("SELECT * FROM products WHERE uuid = ?", [$uuid])[0];
        $this->all['currentCategory'] = DB::select("SELECT * FROM categories WHERE category_id = ?", [$this->all['currentProduct']->category_id])[0];
        $this->all['more'] = DB::select("SELECT * FROM products WHERE category_id = ? ORDER BY RAND() LIMIT 4", [$this->all['currentCategory']->category_id]);
        return view('single', $this->all);
    }


    public function static($param)
    {

        // If the user is logged in, prevent access to the following pages
        if ($this->logged_in) {
            switch ($param) {
                case 'auth':
                    return redirect()->route('home');
                    break;
            }
        }

        // If the user is not logged in, prevent access to the following pages
        if (!$this->logged_in) {
            switch ($param) {
                case 'settings':
                    return redirect('auth');
                    break;
            }
        }

        //add any flash error messages to be used by the view when needed
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


        //add any flash success messages to be used by the view when needed
        $success = session('success');
        if (is_array($success)) {
            $this->all['success'] = $success;
        }


        return view()->exists($param) ? view($param, $this->all) : view('welcome');
    }
}
