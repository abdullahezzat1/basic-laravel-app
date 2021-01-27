<?php

namespace App\Http\Controllers;


class OtherPagesController extends LayoutController
{
    //

    public function newsletterSuccess()
    {
        // dd("hi");
        if (!session('success') && !session('errors')) {
            return redirect()->route('index');
        }

        return view('one-time-message', $this->all);
    }
}
