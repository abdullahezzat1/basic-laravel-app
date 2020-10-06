<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventsController extends LayoutController
{
    //
    public function handle()
    {
        return view('events', $this->all);
    }
}
