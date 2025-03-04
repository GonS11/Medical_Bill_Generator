<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacient extends Model
{
    use HasFactory;

    protected $primaryKey = 'dni';
    public $incrementing = false; // Si DNI no es autoincremental
    protected $keyType = 'string'; // Si DNI es un string

    protected $fillable = ['dni', 'name', 'surname', 'birthday', 'telephone', 'insure_num', 'insurance'];

    public function consults()
    {
        return $this->hasMany(Consult::class);
    }
}
