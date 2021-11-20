<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Question;
use App\Question_user;

class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('typing.index', ['user' => $user]);
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
        $user = Auth::user();
        if(session()->get('user_playing') == true && session()->has('getInsect')) {
            $getInsects = session()->get('getInsect');
            $getInsect = array_unique($getInsects);
            foreach($getInsect as $k => $val) {
                $clearquestion = new Question_user;
                $clearquestion->user_id = $user->id;
                $clearquestion->question_id = $val;
                $clearquestion->save();
            }
            session()->forget('getInsect');
        }

        return redirect('/');
    }

    public function signin($request)
    {
        $email = $request->email;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user();
            $get = Question_user::where('user_id', $user->id)->get();
            if(session()->get('user_playing') == true && session()->has('getInsect')) {
                $getInsects = session()->get('getInsect');
                $getInsect = array_unique($getInsects);
                foreach($getInsect as $k => $val){
                    if(count($get) == 0){
                        $clearquestion = new Question_user;
                        $clearquestion->user_id = $user->id;
                        $clearquestion->question_id = $val;
                        $clearquestion->save();
                    }
                    $search = Question_user::where('user_id', $user->id)
                                        ->where('question_id', $val)
                                        ->get();
                    if(count($search) == 0){
                        $clearquestion = new Question_user;
                        $clearquestion->user_id = $user->id;
                        $clearquestion->question_id = $val;
                        $clearquestion->save();
                    }
                }
                session()->forget('getInsect');
            }
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

    public function picturebook()
    {
        if(Auth::check()){
            $user = Auth::user();
            $get = Question_user::where('user_id', $user->id)->get();
            if(session()->get('user_playing') == true && session()->has('getInsect')) {
                $getInsects = session()->get('getInsect');
                $getInsect = array_unique($getInsects);
                foreach($getInsect as $k => $val){
                    if(count($get) == 0){
                        $clearquestion = new Question_user;
                        $clearquestion->user_id = $user->id;
                        $clearquestion->question_id = $val;
                        $clearquestion->save();
                    }
                    $search = Question_user::where('user_id', $user->id)
                                        ->where('question_id', $val)
                                        ->get();
                    if(count($search) == 0){
                        $clearquestion = new Question_user;
                        $clearquestion->user_id = $user->id;
                        $clearquestion->question_id = $val;
                        $clearquestion->save();
                    }
                }
                session()->forget('getInsect');
            }
            $get = Question_user::where('user_id', $user->id)->get();
            $question = Question::simplepaginate(4);
            $param = [
                'user' => $user,
                'question' => $question,
                'get' => $get,
            ];
            return view('typing.picturebook', $param);
        } else {
            session()->put('user_playing', true);
            return redirect('/login');
        }
    }
}
