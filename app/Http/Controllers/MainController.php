<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Question;

class MainController extends Controller
{
    public function index()
    {
        return view('typing.index');
    }

    public function how_to()
    {
        return view('typing.how_to_play');
    }

    public function login()
    {
        return view('typing.login');
    }

    public function login_route(Request $request)
    {
        if(!empty($_POST['login'])) {
            return $this->signin($request);
        } if(!empty($_POST['entry'])) {
            return $this->entry($request);
        }
    }

    public function entry($request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->admin_flag = $request->admin_flag;
        $user->save();

        Auth::guard()->login($user);

        return redirect('/');
    }

    public function signin($request)
    {
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
