<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function home(Request $request){
        return view('welcome');
    }
    public function about(Request $request){
        return view('welcome');
    }
    public function help(Request $request){
        return view('welcome');
    }
    public function login(Request $request){
        dd('login');
        return view('welcome');
    }
    //注册页面
    public function userCreate(Request $request){
//        dd('userCreate');
        return view('web.users.userCreate');
    }
    //注册用户
    public function userReg(Request $request){
        dd('userReg');
        return view('welcome');
    }

}
