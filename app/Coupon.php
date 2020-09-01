<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'value', 'percent_off', 'type'];

    public static function findByCode($code)
    {
    	return self::where('code', $code)->first();
    }

    public function discount($total)
    {
    	if ($this->type == 'fixed') {
    		return $this->value;
    	} elseif ($this->type == 'percent') {
    		return ($this->percent_off / 100) * $total;
    	} else {
    		return 0;
    	}
    }
}
