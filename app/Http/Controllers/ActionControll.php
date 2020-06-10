<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
class ActionControll extends Controller
{
    public function menu(){
        return view('BootstrapAdmin.pages.tables.simple');
    }
    public function DataTable(){
        return view('BootstrapAdmin.pages.tables.data');
    }
}
