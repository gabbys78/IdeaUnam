<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
  
    public function ideas(): HasMany
    {
    return $this->hasMany(Idea::class);
    }//
}
