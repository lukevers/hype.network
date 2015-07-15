<?php

namespace App\Http\Controllers\Files;

use Storage;

use App\Http\Controllers\Controller;
use App\File;

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
        // Decode the file
        $contents = base64_decode($request['contents']);
        $hash = File::hash();

        // Save the file in the database
        $file        = new File;
        $file->name  = $request['file'];
        $file->type  = $request['type'];
        $file->hash  = $hash;
        $file->owner = Session::get('user')->id;
        $file->save();

        // Put the file at $hash
        Storage::put($hash, $contents);

        // Return the url of where the file is
        return 'http://dl.' . env('APP_URL') . '/' . $hash;
    }

}
