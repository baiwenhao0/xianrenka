<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UsersController extends Controller
{
    public function create()
    {
        return view('web.users.create');
    }

    public function show(User $user)
    {
        return view('web.users.show', compact('user'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        return;
    }
    //下面
    public function home(Request $request){
        return view('welcome');
    }
    public function about(Request $request){
        return view('welcome');
    }
    public function help(Request $request){
        $res = DB::table('users')->get();
        dd($res);
        return view('welcome');
    }
    public function login(Request $request){
        dd('login');
        return view('welcome');
    }
    //注册页面
    public function signup(Request $request){
//        dd('userCreate');
        return view('web.users.create');
    }
    //注册用户
    public function userReg(Request $request){
        dd('userReg');
        return view('welcome');
    }

}
