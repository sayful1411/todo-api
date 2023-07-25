<?php

namespace App\Models;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'mobile',
        'password',
        'otp'
    ];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

}
