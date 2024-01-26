<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysioAreas extends Model
{
    use HasFactory;

    protected $table = 'physio_areas';
    protected $fillable = [
        'title','status',
    ];
    public $timestamps = false;

}
