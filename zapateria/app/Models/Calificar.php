<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificar extends Model
{
    use HasFactory;

    protected $table = 'calificars';
    protected $fillable = [
        'user_id',
        'prod_id',
        'stars_rated'
    ];
}
