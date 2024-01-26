<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PhysioTypes extends Model
{
    use HasFactory;

    protected $table = 'physio_types';
    protected $fillable = [
        'title','status',
    ];

    public $timestamps = false;
}
