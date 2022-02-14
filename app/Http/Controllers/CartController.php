<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function indexCart($idAcc, $locale = 'en')
    {
        App::setlocale($locale);
        if(!Order::where(['account_id'=>$idAcc])->exists()){
            $item = '';
            return view('cart.viewCart',['item' => $item]);
        }
        else{
            $item = DB::table('e_books')
            ->join('orders','e_books.ebook_id', '=', 'orders.ebook_id')
            ->where("account_id",$idAcc)->get();
            // dump($item);
            return view('cart.viewCart',['item' => $item]);
        }
    }

    public function deleteCart($idAcc, $idBook, $locale = 'en'){
        App::setlocale($locale);
        $order = Order::where(['account_id'=>$idAcc,'ebook_id'=>$idBook])->first();
        $order->delete();
        return redirect("/showCart/$idAcc");
    }

    public function submitCart($idAcc, $locale = 'en'){
        App::setlocale($locale);
        Order::where(['account_id'=>$idAcc])->delete();
        return view("success")->with(['sukses', 'berhasil']);
        // return redirect("/success/$locale")->with(['sukses', 'berhasil']);
    }
}
