<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	public $timestamps = false;

	protected $fillable = [
        'user_id', 'symbol_id', 'dateTime', 'shares', 'amount', 'sum', 'price', 'cost', 'total',
    ];

    //protected $with = ['symbol'];

    public function symbol()
    {
        return $this->belongsTo(Symbol::class);
    }
}
