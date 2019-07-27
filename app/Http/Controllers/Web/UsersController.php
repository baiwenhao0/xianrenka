<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store','index','signup']
        ]);
        $this->middleware('guest', [
            'only' => ['create']
        ]);
    }
    public function index()
    {
        $users = User::paginate(10);
        return view('web.users.index', compact('users'));
    }
    public function destroy(User $user)
    {
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', '成功删除用户！');
        return back();
    }
    public function create()
    {
        dd('jjj');
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

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }
    //修改用户
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('web.users.edit', compact('user'));
    }
    //更新用户信息
    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'required|confirmed|min:6'
        ]);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $user->id);
    }



    //注册
    public function signup(Request $request){
//        dd('zhuce');
        return view('web.users.create');
    }
    //下面
    public function about(Request $request){
        return view('welcome');
    }
    public function help(Request $request){
        $res = DB::table('users')->get();
        dd($res);
        return view('welcome');
    }


}
