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
    // Route::get('test', function () {
    //     $chapter = App\truyen::where('TenTruyen', 'like', '%conan%')->get();
    //     $a=0;
    //     foreach ($chapter as $ct) {
    //         $a = $ct->id;
    //     }
    //     $data = App\chapter::where('id_tentruyen','=',$a)->orderBy('Chapter', 'DESC')->get();
    //     foreach ($data as $ct) {
    //                 echo $ct->id."  ";
    //              echo $ct->truyen->TenTruyen."  ";
    //              echo $ct->Chapter."  ";
    //                 echo $ct->truyen->theloai->TenTheLoai."<br/>";
    //                foreach ($ct->linktruyen as $k) {
    //                 echo $k->img."<br/>";
    //                }
                    
            
            
    //     }
    // });
Route::get('','ActionControll@menu');
Route::group(['prefix' => ''], function () {
    Route::match(['get', 'post'], 'home','ActionControll@menu');
    Route::get('DataTable','ActionControll@DataTable' );

    // Route::get('LogIn','AccountControll@LogIn');
    // Route::post('LogIn', 'AccountControll@PostLogIn');

    // Route::get('SignUp','AccountControll@getSignUp');
    // Route::post('SignUp','AccountControll@postSignUp');

    Route::get('data', 'ActionControll@getData');
    Route::get('read/{id}', 'ActionControll@read');
    Route::get('chapter/{id}', 'ActionControll@chapter');
    Route::get('demo', 'ActionControll@demo');

    Route::get('update', 'ActionControll@update');
    Route::post('update', 'ActionControll@postUpdate');
    Route::get('update/{id}', 'ActionControll@updateID');
    Route::post('update/{id}', 'ActionControll@postUpdateID');

    Route::get('updateLink', 'ActionControll@updateLink');
    Route::post('updateLink', 'ActionControll@postUpdateLink');
    Route::get('updateLink/{id}', 'ActionControll@updateLinkGetid');
    Route::post('updateLink/{id}', 'ActionControll@postUpdateLinkGetid');

    Route::get('Addtruyen', 'ActionControll@Addtruyen');
    Route::post('Addtruyen', 'ActionControll@PostAddtruyen');

    Route::get('deleteTruyen/{id}', 'ActionControll@DeleteTruyen');
    Route::get('deleteChapter/{id}', 'ActionControll@DeleteChapter');
});
Route::group(['prefix' => 'json'], function () {
    Route::get('home',"JsonControll@home");
    Route::get('theloai/{id}',"JsonControll@GetTheloai");
    Route::get('read/{id}',"JsonControll@read");
    Route::get('chitiet/{id}',"JsonControll@chitiet" );
    Route::get('theloai',"JsonControll@TheLoai");
});