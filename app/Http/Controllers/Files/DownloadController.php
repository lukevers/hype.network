<?php

namespace App\Http\Controllers\Files;

use Storage;

use App\File;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Create a new download controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('csrf');
    }

    /**
     * Default GET function
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  string $path
     */
    public function get(Request $request, $path)
    {
        $file = File::where('hash', '=', $path)->first();
        if (is_null($file))
        {
            return abort(404);
        }

        if (!Storage::exists($path))
        {
            return abort(404);
        }

        return response(Storage::get($path))->header('Content-Type', $file->type);
    }
}
