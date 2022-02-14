<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $primaryKey = 'order_id';

    //Create one to many relationship with EBook table
    public function ebook()
    {
        return $this->belongsTo(EBook::class, 'ebook_id', 'ebook_id');
    }

    //Create many to one relationship with Account table
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }
}
