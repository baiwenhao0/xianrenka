<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class SessionsController extends Controller
{
    //只让未登录或者未注册的用户访问登录或注册页面
    public function __construct()
    {
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    public function create()
    {
        return view('web.sessions.create');
    }
    //
    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required | min:6'
        ]);
        if (Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            $fallback = route('users.show', Auth::user());
            return redirect()->intended($fallback);//记录上一个访问页面，需要重新登录后跳转的记录页面
//            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }
    //用户退出
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
