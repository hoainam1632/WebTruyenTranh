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

    Route::get('LogIn','AccountControll@LogIn');
    Route::post('LogIn', 'AccountControll@PostLogIn');

    Route::get('SignUp','AccountControll@getSignUp');
    Route::post('SignUp','AccountControll@postSignUp');

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
});
Route::group(['prefix' => 'json'], function () {
    Route::get('list', function () {
        $truyen = App\truyen::OrderBy('id', 'DESC')->get();
        foreach ($truyen as $k) {
            $link[] = ['id'=>$k->id,'TenTruyen'=>$k->TenTruyen,'img'=>  "http://192.168.43.122/Framework-Laravel/WebTruyenTranh/public/Demo/img/poster/".$k->Poster.".jpg"];
        }
        // echo json_encode($truyen);
        echo str_replace("\/","/",json_encode($link));
    });
    Route::get('list/{id}', function ($id) {
        $truyen = App\truyen::where('id_theloai', $id)->get();
        echo json_encode($truyen);
    });
    Route::get('read/{id}', function ($id) {
        $chapter = App\chapter::where('id', $id)->get();
        $name="";
        $number=0;
        $tap=0;
        foreach ($chapter as $ct) {
            $name = $ct->truyen->Poster;
            $number = $ct->SoLuongHinh;
            $tap = $ct->Chapter;
        }
        // $local = "https://blogtravel13-05-20.000webhostapp.com/";
        $local = "http://192.168.43.122/Framework-Laravel/WebTruyenTranh/public/";
        for ($i=0; $i <=$number ; $i++) { 
           $link[] = ['img'=>  $local."Demo/truyen/".$name."/"."Chapter/".$tap."/".$i.".jpg"];
        }
       echo str_replace("\/","/",json_encode($link));
    });
    Route::get('thongtin/{id}', function ($id) {
        // $truyen = App\truyen::where('id', $id)->get();
        $chapter = App\chapter::where('id_tentruyen', $id)->get();
        // foreach ($truyen as $k) {
        //     $arr=['TenTruyen'=>$k->TenTruyen, 'TacGia'=>$k->TacGia, 'img'=>  "http://192.168.137.1/Framework-Laravel/WebTruyenTranh/public/Demo/img/poster/".$k->Poster.".jpg"];
        // }
        foreach ($chapter as $k) {
            $arr[]=['TenTruyen'=>$k->truyen->TenTruyen,'TacGia'=>$k->truyen->TacGia,'chapter'=>$k->Chapter, 'id'=>$k->id,'img'=>  "http://192.168.43.122/Framework-Laravel/WebTruyenTranh/public/Demo/img/poster/".$k->truyen->Poster.".jpg"];
        }
        echo str_replace("\/","/",json_encode($arr));
    });
    Route::get('theloai', function () {
        $theloai = App\theloai::all();
        echo json_encode($theloai);
    });
});