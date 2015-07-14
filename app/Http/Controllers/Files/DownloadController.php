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
     * @param  string $domain
     * @param  \Illuminate\Http\Request $request
     * @param  string $path
     */
    public function get($domain, Request $request, $path)
    {
        $file = File::where('hash', '=', $path)->first();
        if (is_null($file))
        {
            return abort(404);
        }

        $fname = $file->path.$file->name;
        if (!Storage::exists($fname))
        {
            return abort(404);
        }

        return response(Storage::get($fname))->header('Content-Type', $file->type);
    }
}
