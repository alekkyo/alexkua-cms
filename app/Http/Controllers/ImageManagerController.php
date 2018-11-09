<?php

namespace App\Http\Controllers;

class ImageManagerController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('components.image_manager');
    }
}
