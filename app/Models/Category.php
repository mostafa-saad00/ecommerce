<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function scopeActive($query)
    {
    	return $query->where('active', 1);
    }

    public static function save_image($requestData)
    {
	    $photo = $requestData->file('photo');
	    $photo_name = time() . '.' . $photo->getClientOriginalName();
	    $photo->move(public_path('/category_photos'), $photo_name);
	    return $photo_name;
    }
}
