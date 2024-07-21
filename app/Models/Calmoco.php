<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calmoco extends Model
{
    use HasFactory;

    protected $fillable = [
        'alkcal',
        'alqtd',
        'alalimento'
    ];

    protected $table = 'calmoco';
}
