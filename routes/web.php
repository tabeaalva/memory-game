<?php

use App\Http\Middleware\EnsureUsernameIsSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware(EnsureUsernameIsSet::class)->group(function() {

    Route::get('/game', function (Request $request) {
        return view('game', [
            'username' => $request->session()->get('username')
        ]);
    });
    
    Route::get('/end', function (Request $request) {
        $time = (int) ($request->query('time', 0));
        return view('end',[
            'time' => $time,
            'username' => $request->session()->get('username')
        ]);
    });
});
Route::post('/session/new', function (Request $request) {
    $attributes = $request->validate([
        'username' => 'required'
    ]);
    $request->session()->put('username', $attributes['username']);
    return redirect('/game');
});

