<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['images'];

    public function post()
    {
    	return $this->belongsTo(Product::class);
    }
}
