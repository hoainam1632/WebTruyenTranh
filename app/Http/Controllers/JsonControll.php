<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\truyen;
use App\chapter;
use App\theloai;
use App\thongtin;
class JsonControll extends Controller
{
    public function home(){
        $thongtin = thongtin::OrderBy('id_truyen', 'DESC')->get();
        foreach ($thongtin as $k) {
            $link[] = ['id'=>$k->truyen->id,'TenTruyen'=>$k->truyen->TenTruyen,
            'TheLoai'=>$k->truyen->theloai->TenTheLoai,'NewChapter'=>$k->NewChapter,
            'img'=>  "http://192.168.43.122/Framework-Laravel/WebTruyenTranh/public/Demo/img/poster/".$k->truyen->Poster.".jpg"];
        }
        return $link;
    }


    public function GetTheloai($id){
        $truyen = truyen::where('id_theloai', $id)->get();
        foreach ($truyen as $k) {
            $thongtin = thongtin::where('id_truyen',$k->id)->get();
            foreach($thongtin as $tt){
            $link[] = ['id'=>$k->id,'TenTruyen'=>$k->TenTruyen,
            'TheLoai'=>$k->theloai->TenTheLoai,'NewChapter'=>$tt->NewChapter,
            'img'=>  "http://192.168.43.122/Framework-Laravel/WebTruyenTranh/public/Demo/img/poster/".$k->Poster.".jpg"];
        }
    }
        return $link;
    }


    public function TheLoai(){
        $theloai = theloai::all();
        return $theloai;
    }


    public function chitiet($id){
        $chapter = chapter::where('id_tentruyen', $id)->get();
        $thongtin = thongtin::where('id_truyen',$id)->get();
        $date = 0;
        foreach ($chapter as $k) {
            foreach ($thongtin as $tt) {  
                $date = strtotime($tt->updated_at);     
            $arr[]=['TenTruyen'=>$k->truyen->TenTruyen,'TacGia'=>$k->truyen->TacGia,
            'chapter'=>$k->Chapter,'updated'=>date("d/m/Y",$date) ,
            'id'=>$k->id,'img'=>  "http://192.168.43.122/Framework-Laravel/WebTruyenTranh/public/Demo/img/poster/".$k->truyen->Poster.".jpg"];
            }
        }
      
        return $arr;
    }


    public function read($id){
        $chapter = chapter::where('id', $id)->get();
        $name="";
        $number=0;
        $tap=0;
        $idTruyen = 1;
        $idback = 0;
        $idnext = 0;
        foreach ($chapter as $ct) {
            $name = $ct->truyen->Poster;
            $number = $ct->SoLuongHinh;
            $tap = $ct->Chapter;
            $idTruyen = $ct->id_tentruyen;
        }
        $backChapter = chapter::where([['id_tentruyen',$idTruyen],['Chapter',$tap-1]])->get();
        $nextChapter = chapter::where([['id_tentruyen',$idTruyen],['Chapter',$tap+1]])->get();
        if(isset($backChapter)){
            foreach ($backChapter as $bc) {
                $idback = $bc->id;
            }
        }
        if(isset($nextChapter)){
            foreach ($nextChapter as $nc) {
                $idnext = $nc->id;
            }
        }
        // $local = "https://blogtravel13-05-20.000webhostapp.com/";
        $local = "http://192.168.43.122/Framework-Laravel/WebTruyenTranh/public/";
        for ($i=0; $i <=$number ; $i++) {
           $link[] = ['idBack'=>$idback,'idNext'=>$idnext,'NextChapter'=>$ct->Chapter,'Chapter'=>$tap,'img'=>  $local."Demo/truyen/".$name."/"."Chapter/".$tap."/".$i.".jpg"];
        }
        return $link;
    }
}
