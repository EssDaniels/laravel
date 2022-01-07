<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'patient_id',
        'date'
    ];
    // fukncja doctor powoduje że po kluczu obcym "doctor_id" mamy dostep do danych 
    // użytkowania z tabeli user np. 
    //doctor->name 
    //doctor->phone itd. 
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
