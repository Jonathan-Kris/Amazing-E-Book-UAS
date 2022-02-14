<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    //Create one to many relationship with Order table
    public function order()
    {
        return $this->hasMany(Order::class, 'order_id', 'order_id');
    }

    //Create many to one relationship with Role table
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }

    //Create one to many relationship with Gender table
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'gender_id');
    }
}
