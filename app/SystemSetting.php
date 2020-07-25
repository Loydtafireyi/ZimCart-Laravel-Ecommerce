<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $fillable = ['name', 'description', 'email', 'tel', 'address', 'logo'];

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
