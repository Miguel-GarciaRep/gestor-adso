<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'programa',
    ];

    public function aprendices()
    {
        return $this->hasMany(Aprendiz::class);
    }
}
