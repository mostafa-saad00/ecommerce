<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
    	return $query->where('active', 1);
    }

    public function getActiveAttribute($val)
    {
    	return $val == 1 ? 'active' : 'inactive';
    }
}
