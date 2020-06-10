<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\addRequest;
use App\Account;
class AccountControll extends Controller
{
    public function LogIn(){
        if(session()->has('name')){
            session()->forget('name');
        }
        return view('LogIn');
    }
    public function PostLogIn(Request $request){
       $ac = Account::all();
       $count = 0;
       foreach ($ac as $row) {
        if($request->email == $row->email && $request->pass == $row->pass )
        {
            session()->put('name',$row->Fullname);
             return view('BootstrapAdmin.pages.tables.simple');
        }
        $count++;
       }
       if ($count != 0) {
           echo "sai tai khoan hoac mat khau";
       }
    }
    public function getSignUp(){
        return view('SignUp');
    }
    public function postSignUp(Request $request){
        $acc = new Account;
        $acc->user = $_POST['username'];
        $acc->pass = $_POST['pass'];
        $acc->email = $_POST['email'];
        $acc->Fullname = $_POST['name'];
        $acc->save();
        return view('LogIn');
    }
}
