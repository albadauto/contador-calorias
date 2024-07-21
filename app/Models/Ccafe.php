<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ccafe extends Model
{
    use HasFactory;
    protected $fillable = [
        'cafkcal',
        'cafalimento',
        'cafqtd'
    ];

    protected $table = "ccafe";
}
