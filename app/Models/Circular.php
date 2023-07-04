<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circular extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'division_id',
        'circular_no',
        'title',
        'description',
        'document',
    ];
}
