<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    //ユーザー検索画面の表示
    public function index(){
        return view('users.search');
    }

    //ユーザー検索画面の表示
    public function search(){
        return view('users.search');
    }

}
