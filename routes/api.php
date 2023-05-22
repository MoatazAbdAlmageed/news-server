<?php

use App\Http\Controllers\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('bbc', function () {
    $response = file_get_contents('https://bbc-api.tah3.repl.co/spanish/news');
    $data = json_decode($response);
    dd($data);
})->name('news.bbc');


Route::get('nytimes', function () {

})->name('news.nytimes');

Route::restifyAuth();
