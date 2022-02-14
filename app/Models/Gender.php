<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $primaryKey = 'gender_id';

    //Create one to many relationship with Account
    public function account()
    {
        return $this->hasMany(Account::class, 'account_id', 'account_id');
    }
}
