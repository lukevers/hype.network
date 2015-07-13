<?php

/*
|--------------------------------------------------------------------------
| Download Routes
|--------------------------------------------------------------------------
|
| These routes handle downloading files from the server.
|
*/

Route::group(['domain' => 'dl.{domain}'], function() {

    Route::controller('/', Files\DownloadController::class);

});

/*
|--------------------------------------------------------------------------
| Upload Routes
|--------------------------------------------------------------------------
|
| These routes handle uploading files to the server.
|
*/


Route::group(['domain' => 'up.{domain}'], function() {

    Route::controller('/', Files\UploadController::class);

});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
|
| These routes handle what is left over, and sub-domains that do not have
| specific route groups.
|
*/

Route::controller('/', PublicController::class);
