<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motus extends Model
{
    use HasFactory;

    protected $table = 'motus'; 

    protected $fillable = [
        'word',
    ];
}
