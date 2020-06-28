<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
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
