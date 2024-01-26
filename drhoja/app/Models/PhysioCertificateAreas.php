<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PhysioCertificateAreas extends Model
{
    use HasFactory, Notifiable;

    protected $table = "physio_certificate_areas";

    protected $fillable = [
        'id','physio_area_id','physio_certificate_id',
    ];
    public function areas()
    {
        return $this->hasOne(PhysioAreas::class ,  'id','physio_area_id');
    }

}
