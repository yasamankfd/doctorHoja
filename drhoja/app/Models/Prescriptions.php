<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Prescriptions extends Model
{
    use HasFactory, Notifiable;


    protected $table = "prescription";
    protected $fillable = [
        'user_id','description','date',];
    public function dateToMiladi(String $date)
    {
        return \Morilog\Jalali\Jalalian::fromFormat('Y/m/d', $date)->toCarbon();
    }
    public function dateToJalali(String $date)
    {
        return \Morilog\Jalali\Jalalian::fromCarbon(Carbon::parse($date))->format('Y/m/d');

    }
    public function prescription_medicines()
    {
        return $this->hasMany(PrescriptionMedicines::class , 'prescription_id' , 'id');
    }

}
