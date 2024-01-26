<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PhysioCertificateTypes extends Model
{
    use HasFactory, Notifiable;

    protected $table = "physio_certificate_types";

    protected $fillable = [
        'id','physio_type_id','physio_certificate_id',
    ];
    public function physio_types()
    {
        return $this->hasOne(PhysioTypes::class ,  'id','physio_type_id');
    }

}
