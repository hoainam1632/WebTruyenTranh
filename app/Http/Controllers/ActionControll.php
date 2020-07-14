<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\truyen;
use App\chapter;
use App\thongtin;
use App\TheLoai;
class ActionControll extends Controller
{
    //=============== HOME ==================================//
    public function menu(){
        $thongtin = thongtin::all();
        if (isset($_POST['search']) && $_POST['table_search'] != "") {
            $data = truyen::where('TenTruyen', 'like', '%'.$_POST['table_search'].'%')->get();
            foreach ($data as $dt) {
               $thongtin = thongtin::where('id_truyen','=',$dt->id)->get();
            }
        }
        return view('BootstrapAdmin.pages.tables.simple', compact('thongtin'));
    }
    public function DataTable(){
        return view('BootstrapAdmin.pages.tables.data');
    }
 //=============== END HOME ==================================//

    
 
 //============CẬP NHẬT CHAPTER============//

    public function update()
    {
        $thongtin = thongtin::orderBy('id', 'DESC')->get();
         return view('BootstrapAdmin.pages.forms.Update',compact('thongtin'));
    }
    public function postUpdate(request $request)
    { 
        $thongtin = thongtin::orderBy('id', 'DESC')->get();
          
        if (isset($_POST['search']) && $_POST['table_search'] != "") {
            $data = truyen::where('TenTruyen', 'like', '%'.$_POST['table_search'].'%')->get();
            foreach ($data as $dt) {
               $thongtin = thongtin::where('id_truyen','=',$dt->id)->get();
            }
        }
        
           return view('BootstrapAdmin.pages.forms.Update',['thongtin'=>$thongtin]);
    }


    public function updateID($id)
    {
        $thongtin = thongtin::orderBy('id', 'DESC')->get();
        $data = truyen::where('id',$id)->get();
         return view('BootstrapAdmin.pages.forms.Update',['thongtin'=>$thongtin, 'data'=>$data]);
    }
    public function postUpdateID(request $request, $id)
    { 
        $thongtin = thongtin::orderBy('id', 'DESC')->get();
        $mess="";
        if (isset($_POST['search']) && $_POST['table_search'] != "")
         {
            $data = truyen::where('TenTruyen', 'like', '%'.$_POST['table_search'].'%')->get();
            foreach ($data as $dt) {
               $thongtin = thongtin::where('id_truyen','=',$dt->id)->get();
            }
        }

           if(isset($_POST['submit'])){
               if ($_POST['chapter'] != "" && $_POST['number'] !="") {
               $add = new chapter;
               $add->id_tentruyen = $_POST['id'];
               $add->Chapter = $_POST['chapter'];
               $add->SoLuongHinh = $_POST['number'];
               $add->save();

               $thongtin = thongtin::Where('id_truyen','=',$_POST['id'])->get();
               foreach ($thongtin as $tt) {
                $updateTT = thongtin::find($tt->id);
                $updateTT->NewChapter = $_POST['chapter'];
                $updateTT->save();
              }
               $mess = "Cập nhật thành công";
               }else $mess = "Cập nhật thất bại";
           }
           return view('BootstrapAdmin.pages.forms.Update',['thongtin'=>$thongtin, 
                    'mess'=>$mess]);
    }

    //====================/END CẬP NHẬT CHAPTER/============//



    //============CẬP NHẬT LINK TRUYỆN===================================//


    //=========/  Đường dẫn không có id/  ==============================//
    public function updateLink()
    {
        $chapter = chapter::orderBy('id_tentruyen', 'DESC')->get();
         return view('BootstrapAdmin.pages.forms.UpdateLinkTruyen', [ 
         'chapter'=>$chapter]);
    }
    
    public function postUpdateLink(request $request)
    { 
        $chapter = chapter::orderBy('id_tentruyen', 'DESC')->get();
        if (isset($_POST['search']) && $_POST['table_search']!="" ) {
             $search = truyen::where('TenTruyen', 'like', '%'.$_POST['table_search'].'%')->get();
             $id = 0;
             foreach ($search as $sr) {
                 $id = $sr->id;
             }
             $chapter = chapter::where('id_tentruyen','=',$id)->orderBy('Chapter', 'DESC')->get();
         }
           return view('BootstrapAdmin.pages.forms.UpdateLinkTruyen',['chapter'=>$chapter]);
    }

    //=========/ Đường dẫn có id  /==================================//

    public function updateLinkGetid($id)
    {
        $add = chapter::where('id','=',$id)->get();
        $chapter = chapter::orderBy('id_tentruyen', 'DESC')->get();
         return view('BootstrapAdmin.pages.forms.UpdateLinkTruyen', ['add'=>$add, 
         'chapter'=>$chapter]);
    }

    public function postUpdateLinkGetid(request $request, $id)
    { 
        $chapter = chapter::orderBy('id_tentruyen', 'DESC')->get();
        $mess="";
        if (isset($_POST['search']) && $_POST['table_search']!="") {
             $search = truyen::where('TenTruyen', 'like', '%'.$_POST['table_search'].'%')->get();
             $id_tentruyen = 0;
             foreach ($search as $sr) {
                 $id_tentruyen = $sr->id;
             }
             $chapter = chapter::where('id_tentruyen','=',$id_tentruyen)->orderBy('Chapter', 'DESC')->get();
         }
           if(isset($_POST['submit'])){
               if (isset($_POST['number']) && $_POST['number'] != "") {
                   $update = chapter::find($id);
                   $update->SoLuongHinh = $_POST['number'];
                   $update->save();
                    $mess = "Cập nhật thành công";
               }else $mess = "Cập nhật thất bại";
           }
           return view('BootstrapAdmin.pages.forms.UpdateLinkTruyen',[ 
                    'mess'=>$mess, 'chapter'=>$chapter]);
    }
    //====================/END CẬP NHẬT LINK TRUYỆN/============//


    //====================/ADD TRUYỆN/============//

    public function Addtruyen()
    {
        $chapter = chapter::orderBy('id_tentruyen', 'DESC')->get();
        $theloai = TheLoai::all();
         return view('BootstrapAdmin.pages.forms.AddTruyen', [ 
         'chapter'=>$chapter, 'theloai'=>$theloai]);
    }
    public function PostAddtruyen()
    {
        $chapter = chapter::orderBy('id_tentruyen', 'DESC')->get();
        $theloai = TheLoai::all();
        $mess="";
        if (isset($_POST['search']) && $_POST['table_search']!="" ) {
            $search = truyen::where('TenTruyen', 'like', '%'.$_POST['table_search'].'%')->get();
            $id = 0;
            foreach ($search as $sr) {
                $id = $sr->id;
            }
            $chapter = chapter::where('id_tentruyen','=',$id)->orderBy('Chapter', 'DESC')->get();
        }

        if (isset($_POST['submit'])) {
            if ($_POST['name'] != "" && $_POST['theloai'] != "" && $_POST['tacgia'] != "" && $_POST['poster'] != "") {
                $truyen = new truyen;
                $truyen->TenTruyen = $_POST['name'];
                $truyen->id_theloai = $_POST['theloai'];
                $truyen->TacGia = $_POST['tacgia'];
                $truyen->Poster = $_POST['poster'];
                $truyen->save();
                
                $query = truyen::select(truyen::raw('MAX(id) as id'))->get();
                foreach ($query as $t) {
                $thongtin = new thongtin;
                $thongtin->id_truyen = $t->id;
                $thongtin->NewChapter = 0;
                $thongtin->save();
            }
                $mess="Thêm thành công";
            }else $mess="Thêm thất bại";
        }
         return view('BootstrapAdmin.pages.forms.AddTruyen', [ 'mess'=>$mess,
         'chapter'=>$chapter, 'theloai'=>$theloai]);
    }

//====================/END ADD TRUYỆN/============//


 //====================/ ĐỌC TRUYỆN /============//
    public function read($id)
    {
        $data = chapter::Where('id',$id)->get();
        foreach ($data as $dt) {
            $name = $dt->truyen->Poster;
            $id_tentruyen = $dt->id_tentruyen;
            $chapter = $dt->Chapter;   
            $links = $dt->SoLuongHinh;   
        }
            return view('Read', ['name'=>$name, 'chapter'=>$chapter,'id_tentruyen'=>$id_tentruyen, 'links'=>$links]);
    }
     //====================/END ĐỌC TRUYỆN/============//


      //====================/ CHAPTER /============//
    public function chapter($id)
    {
        $data = truyen::where('id',$id)->get();
        $chapter = chapter::where('id_tentruyen',$id)->OrderBy('id','DESC')->get();
        $CTone="";
        foreach ($chapter as $k) {
            $CTone= $k->id;
        }
        return view('Chapter', ['data'=>$data, 'chapter'=>$chapter, 'CTone'=>$CTone]);
    }
     //====================/ END CHAPTER /============//


 //====================/ DEMO /============//
    public function demo()
    {
        $data = truyen::OrderBy('id', 'DESC')->get();
        return view('Demo', compact('data'));
    }
     //====================/ END DEMO /============//
}
