<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'hour', 'username', 'dni'];

    public function setHourAttribute($value)
    {
        // Asegúrate de que el valor de la hora esté en el formato adecuado (H:i:s)
        $this->attributes['hour'] = \Carbon\Carbon::createFromFormat('H:i:s', $value)->format('H:i:s');
    }

    public function pacient()
    {
        return $this->belongsTo(Pacient::class, 'dni', 'dni');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'username', 'username');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
