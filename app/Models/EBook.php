<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBook extends Model
{
    use HasFactory;
    public $primaryKey = 'ebook_id';

    //Create one to many relationship with order table
    public function order()
    {
        return $this->hasMany(Order::class, 'order_id', 'order_id');
    }

}
