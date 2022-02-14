<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function indexLogin($locale = 'en'){
        App::setlocale($locale);
        return view('login');
    }

    public function login(Request $request, $locale = 'en'){
        App::setlocale($locale);
        $credentials = $request->validate([
            'email'=>['required','email'],
            'password'=>['required','min:8']
        ]);

        // Remember Me
        $minutes = 60;
        Cookie::queue('EMAIL_COOKIE', $request->email, $minutes); # time in minute(s)
        Cookie::queue('PASSWORD_COOKIE', $request->password, $minutes);

        if(Auth::attempt($credentials,true)){
            Session::put('mysession',$request->email);
            return redirect()->intended('/index');
        }
        return redirect('/login');
    }

    public function indexRegister($locale = 'en'){
        App::setlocale($locale);
        return view('register');
    }

    public function register(Request $request, $locale = 'en'){
        App::setlocale($locale);
        $validateData = $request-> validate([
            'first_name'=> 'required|max:25|alpha_num',
            'middle_name'=> 'nullable|max:25|alpha_num',
            'last_name'=> 'required|max:25|alpha_num',
            'email' => 'email',
            'password' => 'min:8|regex:/[0-9]/',
            'display_pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $account = new Account();
        $account->first_name = $validateData['first_name'];
        $account->middle_name = $validateData['middle_name'];
        $account->last_name = $validateData['last_name'];
        $account->gender_id = $request->gender;
        $account->role_id = $request->role;
        $account->email = $validateData['email'];
        $account->delete_flag = 0;
        $account->password = bcrypt($validateData['password']);
        $file = $request->display_pic;

        $filename = time().'.'.$file->getClientOriginalExtension();

        Storage::putFileAs('public/images',$file,$filename);
        $path = 'images/' . $filename;
        $account->display_picture_link = $path;
        $account->save();

        return redirect('/login')->with('registered','User Registered!');
    }

    public function logout($locale = 'en'){
        App::setLocale($locale);
        Auth::logout();
        Session::flush();
        return view('logout');
    }
}
