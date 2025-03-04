<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'date', 'consult_id'];

    public function consult()
    {
        return $this->belongsTo(Consult::class);
    }
}
