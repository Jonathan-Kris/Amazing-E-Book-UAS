<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //Create function for displaying Profile Page
    public function indexProfile($locale = 'en'){
        App::setLocale($locale);
        return view('profile');
    }

    //Create function for updating Profile
    public function updateProfile(Request $request, $idaccount, $locale = 'en'){
        $validateData = $request->validate([
            'first_name'=> 'required|max:25|alpha_num',
            'middle_name'=> 'nullable|max:25|alpha_num',
            'last_name'=> 'required|max:25|alpha_num',
            'email' => 'email',
            'password' => 'min:8|regex:/[0-9]/',
            'display_pic' => 'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);

        $account = Account::find($idaccount);
        $account->first_name = $validateData['first_name'];
        $account->middle_name = $validateData['middle_name'];
        $account->last_name = $validateData['last_name'];
        $account->email = $validateData['email'];
        $account->password = bcrypt($validateData['password']);

        $file = $request->display_pic;
        $filename = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images',$file,$filename);
        $path = 'images/' . $filename;
        $account->display_picture_link = $path;

        //Save account to DB
        $account->save();

        return redirect('/index');
    }
}
