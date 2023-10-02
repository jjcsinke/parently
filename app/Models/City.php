<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class City extends Model
{
    use HasFactory;

    public function schools(): HasMany
    {
        return $this->hasMany(School::class);
    }

    public function children(): HasManyThrough
    {
        return $this->hasManyThrough(Child::class,School::class);
    }
}
