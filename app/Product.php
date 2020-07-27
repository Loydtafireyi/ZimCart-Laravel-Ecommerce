<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'description', 'image', 'status', 'slug', 'quantity', 'price'];

    /**
    * change key from id to slug
    * @param $slug
    *
    */
    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }

    public function inStock()
    {
        return $this->quantity > 0;
    }
}
