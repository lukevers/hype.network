<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    /**
     * Create a new public controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('');
    }

    /**
     * Index Page
     *
     * @return view
     */
    public function getIndex()
    {
        return view('public.index');
    }
}
