<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;


    public function circulars(): HasMany
    {
        return $this->hasMany(Circular::class)->orderBy('created_at', 'desc');
    }
}
