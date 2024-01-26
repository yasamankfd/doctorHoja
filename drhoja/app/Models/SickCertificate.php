<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class SickCertificate extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'sick_certificate';
    public static function dateToMiladi(String $date)
    {
        return \Morilog\Jalali\Jalalian::fromFormat('Y/m/d', $date)->toCarbon();
    }
    public static function dateToJalali(String $date)
    {
        return \Morilog\Jalali\Jalalian::fromCarbon(Carbon::parse($date))->format('Y/m/d');

    }
    protected $fillable = [
        'id','user_id','start_date','end_date','date',
        'description',

    ];

}
