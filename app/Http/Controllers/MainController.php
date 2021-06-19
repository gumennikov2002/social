<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use App\models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{
    function index()
    {
        $uid = session('LoggedUser');
        // $post = DB::table('posts')->orderBy('id', 'desc')->get();
        $post = DB::table('posts')->join('users', 'user_id', '=', 'users.id')->select('posts.*', 'users.name')->orderBy('posts.id', 'desc')->get();
        $data 
        =[
            'LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first(),
            'post' => $post
        ];
        return view('index', $data);
    }

    function login()
    {
        return view('auth');
    }

    function reg()
    {
        return view('auth');
    }

    function save(Request $request)
    {
        $request->validate
        ([
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:30'
        ]);
        $email = $request['email'];
        $exp_name = (explode("@", $email))[0];

        $user = new User;
        // $user->name = first(explode('@', $request->email));
        $user->name = $exp_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

        if($save)
        {
            return back()->with('success', 'Вы успешно зарегистрировались');
        }
        else
        {
            return back()->with('fail', 'Что-то пошло не так');
        }
    }

    function check(Request $request)
    {
        $request->validate
        ([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $userInfo = User::where('email', '=', $request->email)->first();

        if(!$userInfo)
        {
            return back()->with('fail', 'Пользователь с таким email не найден');
        }
        else
        {
            if(Hash::check($request->password, $userInfo->password))
            {
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('profile');
            }
            else
            {
                return back()->with('fail', 'Неправильный пароль');
            }
        }
    }

    function profile()
    {
        $uid = session('LoggedUser');
        $post = DB::table('posts')->where('user_id', '=', $uid)->orderBy('id', 'desc')->get();
        $count_posts =DB::table('posts')->where('user_id', '=', $uid)->count();
        $users_info = DB::table('users')->get();
        $data 
        =[
            'LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first(),
            'post' => $post
        ];

        if($count_posts == 0)
        {
            return view('profile', $data);
        }
        else
        {
            return view('profile', $data);
        }
    }

    function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('/auth');
        }
    }

}
