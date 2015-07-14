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
        $this->middleware('verify.key');
    }

    /**
     * POST function
     * 
     * @param  \Illuminate\Http\Request $request
     */
    public function post(Request $request)
    {
        $contents = base64_decode($request['contents']);
        return $request['file'];
    }

}
