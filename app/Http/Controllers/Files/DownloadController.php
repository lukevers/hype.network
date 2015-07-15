<?php

namespace App\Http\Controllers\Files;

use Storage;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $file->increment('views');

        return response(Storage::get($path))->header('Content-Type', $file->type);
    }
}
