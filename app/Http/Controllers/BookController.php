<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BookController extends Controller
{
    public function bookDetail($id, $locale = 'en')
    {
        App::setlocale($locale);
        $book = EBook::find($id);
        return view('bookDetail', ['book' => $book]);
    }

    public function rentBook($idAcc, $idbook, $locale = 'en')
    {
        App::setlocale($locale);
        $order = new Order();
        $date = date('Y-m-d H:i:s');
        $order->account_id = $idAcc;
        $order->ebook_id = $idbook;
        $order->order_date = $date;
        $order->save();
        return redirect("/showCart/$idAcc/$locale");
    }
}
