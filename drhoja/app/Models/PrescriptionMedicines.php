<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class PrescriptionMedicines extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'id','medicine_id','prescription_id',

    ];
    public function medicines()
    {
        return $this->hasOne(Medicines::class ,  'id','medicine_id');
    }




}
