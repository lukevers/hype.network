<?php

/*
|--------------------------------------------------------------------------
| Download Routes
|--------------------------------------------------------------------------
|
| These routes handle downloading files from the server.
|
*/

$downloads = function() {
    Route::controller('/', Files\DownloadController::class);
};

Route::group(['domain' => 'dl.'  .env('APP_URL')], $downloads);
Route::group(['domain' => 'h.dl.'.env('APP_URL')], $downloads);

/*
|--------------------------------------------------------------------------
| Upload Routes
|--------------------------------------------------------------------------
|
| These routes handle uploading files to the server.
|
*/

$uploads = function() {
    Route::controller('/', Files\UploadController::class);
};

Route::group(['domain' => 'up.'  .env('APP_URL')], $uploads);
Route::group(['domain' => 'h.up.'.env('APP_URL')], $uploads);

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| These routes handle authentication, registration, and other public user
| routes.
|
*/

Route::group(['prefix' => 'user'], function() {
    Route::controllers([
        'password' => Auth\PasswordController::class,
        ''         => Auth\AuthController::class,
    ]);
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
