<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Symbol extends Model
{
	public $timestamps = false;

	public function getRouteKeyName()
    {
    	return 'symbol';
    }

    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }
}
