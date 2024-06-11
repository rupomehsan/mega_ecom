<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| be assigned to the "web" middleware group. Make something great!
|
*/
// git rm --cached --ignore-unmatch storage/log/oauth-private.zip


Route::get('/dashboard', function () {
    return view('backend.dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

require_once __DIR__ . '/shefat_route.php';
require_once __DIR__ . '/website_api_route.php';
