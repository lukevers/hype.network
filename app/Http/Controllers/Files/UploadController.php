<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Create a new upload controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // authenticate
    }

    /**
     * POST function
     * 
     * @param  string $domain
     * @param  \Illuminate\Http\Request $request
     * @param  string $path
     */
    public function post($domain, Request $request, $path)
    {
        // TODO
    }

}
