<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['donor_id', 'date', 'time', 'status', 'notes'];

    public function donor()
    {
        return $this->belongsTo(Donor::class, 'donor_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'donor_id');
    }
}
