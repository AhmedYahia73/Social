<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = "user";

    protected $fillable = [
        'ID',
        'userName',
        'password',
        'email',
        'phone',
        'userImage',
        'groupID',
        'date',
    ];

    protected $hidden = [
        'password',
    ];
}
