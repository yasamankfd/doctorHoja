<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PhysioCertificate extends Model
{
    use HasFactory, Notifiable;


    protected $table = "physio_certificate";
    protected $fillable = [
        'id','user_id','num_of_sessions',
        'date','description',
    ];

    public function physio_areas(){
        return $this->hasMany(PhysioCertificateAreas::class , 'physio_certificate_id' , 'id');
    }
    public function physio_types(){
        return $this->hasMany(PhysioCertificateTypes::class , 'physio_certificate_id' , 'id');
    }
}

