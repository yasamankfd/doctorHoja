<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;




    protected $fillable = [
        'id','username','national_code','name','phone','email',  'password','status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function names(): HasMany
    {
        return $this->hasMany(User::class,'id');
    }
    public function payments(): HasMany
    {
        return $this->hasMany(Payments::class,'user_id');
    }
    public function prescriptions(): HasMany
    {
        return $this->hasMany(Prescriptions::class,'user_id');
    }
    public function sick_certificate(): HasMany
    {
        return $this->hasMany(SickCertificate::class,'user_id');
    }
    public function physio_certificate(): HasMany
    {
        return $this->hasMany(PhysioCertificate::class,'user_id');
    }

    public function user_output2()
    {
        $output = $this->payments()
            ->select(['date','user_id', 'id' , \DB::raw("'payments' AS table_name")])
            ->get()
            ->concat($this->prescriptions()
                ->select(['date','user_id', 'id', \DB::raw("'prescriptions' AS table_name")])
                ->get())
            ->concat($this->sick_certificate()
                ->select(['date','user_id', 'id', \DB::raw("'sick_certificate' AS table_name")])
                ->get())
            ->concat($this->physio_certificate()
                ->select(['date','user_id', 'id', \DB::raw("'physio_certificate' AS table_name")])
                ->get());


        return $output;
    }



}
