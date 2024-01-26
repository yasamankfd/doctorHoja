<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Payments extends Model
{
    use HasFactory, Notifiable;

    protected $table = "payment";
    protected $fillable = [
        'id','user_id','description','date','amount','number',
    ];

}
