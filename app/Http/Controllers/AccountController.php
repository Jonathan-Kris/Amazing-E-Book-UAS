<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AccountController extends Controller
{
    public function indexAccount($locale = 'en')
    {
        App::setlocale($locale);
        $user = Account::where(['delete_flag' => 0])->get();
        return view('management.viewAccount', ['user' => $user]);
    }

    public function indexUserDetail($idAcc, $locale = 'en')
    {
        App::setlocale($locale);
        $user = Account::where(['id' => $idAcc])->first();
        return view('management.accountDetail', ['user' => $user]);
    }

    public function userDelete($idAcc, $locale = 'en'){
        App::setlocale($locale);
        Account::where('id',$idAcc)->update([
            'delete_flag' => 1,
        ]);
        return redirect("/account/$locale");
    }

    public function userUpdate(Request $request, $idAcc, $locale = 'en')
    {
        App::setlocale($locale);
        Account::where('id',$idAcc)->update([
            'role_id' => $request->role,
        ]);
        return redirect("/account/$locale");
    }
}
