<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentative extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mot',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
