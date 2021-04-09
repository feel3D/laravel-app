<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Events\Message;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('chat');
});

Route::post('/messages', function (Request $request) {
    Message::dispatch($request->input('body'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//
Route::get('/t', function () {
//    return 'главная страница сайта';
    return redirect()->route('test');
});

Route::get('/foo', [App\Http\Controllers\TestController::class, 'foo'])->name('test');
Route::get('/www/{id}', [App\Http\Controllers\TestController::class, 'param']);


Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
Route::get('user/qwe/{id}', function ($id) {
    return 'User '.$id;
});
//Route::get('/user/{$id}', function ($id) {
//    return 'User ID is: '.$id;
//})->where('id', '[0-9]+');


Route::get('/form', [App\Http\Controllers\TestController::class, 'form']);
Route::get('/set', [App\Http\Controllers\TestController::class, 'set']);
Route::get('/get', [App\Http\Controllers\TestController::class, 'get']);
Route::get('/model', [App\Http\Controllers\TestController::class, 'model']);
Route::get('/my', [\App\Http\Controllers\TestController::class, 'test']);




//vue
Route::get('/start', [\App\Http\Controllers\StartController::class, 'index']);
Route::get('/start/socket-chart', [\App\Http\Controllers\StartController::class, 'newEvent']);
//ajax
Route::get('/start/get-json', [\App\Http\Controllers\StartController::class, 'getJson']);
//chart js
Route::get('/start/data-chart', [\App\Http\Controllers\StartController::class, 'chartData']);
Route::get('/redis', [\App\Http\Controllers\StartController::class, 'redis']);




