<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cjantar extends Model
{
    use HasFactory;
    protected $fillable = [
        'jantalimento',
        'jantkcal',
        'jantqtd'
    ];
    protected $table = 'cjantar';
}
