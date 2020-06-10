<?php

use Illuminate\Support\Facades\Route;
use App\Account;
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

Route::get('','ActionControll@menu');
Route::group(['prefix' => ''], function () {
    Route::match(['get', 'post'], 'home','ActionControll@menu');
    Route::get('DataTable','ActionControll@DataTable' );
    Route::get('LogIn','AccountControll@LogIn');
    Route::post('LogIn', 'AccountControll@PostLogIn');
    Route::get('SignUp','AccountControll@getSignUp');
    Route::post('SignUp','AccountControll@postSignUp');
});
