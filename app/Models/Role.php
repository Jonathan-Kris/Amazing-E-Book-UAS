<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $primaryKey = 'role_id';

    //Create one to many relationship with Account table
    public function account()
    {
        return $this->hasMany(Account::class, 'account_id', 'account_id');
    }
}
