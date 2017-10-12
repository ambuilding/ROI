<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	public $timestamps = false;

	protected $fillable = [
        'user_id', 'symbol_id', 'dateTime', 'shares', 'amount', 'price', 'totalShares', 'totalAmount', 'cost',
    ];

    //protected $with = ['symbol'];

    // Boot the model.
    protected static function boot()
    {
        parent::boot();

        static::created(function ($transaction) {
            $transaction->calculateCost();
        });
    }

    public function symbol()
    {
        return $this->belongsTo(Symbol::class);
    }

    protected function calculateCost()
    {
        $this->update([
        	'price' => $this->shares ? $this->amount / $this->shares : 0,
        	'totalShares' => $totalShares = $this->sumColumn('shares'),
        	'totalAmount' => $totalAmount = $this->sumColumn('amount'),
        	'cost' => $totalAmount / $totalShares,
    	]);
    }

    protected function sumColumn($column)
    {
    	return \DB::table('transactions')->where('symbol_id', $this->symbol_id)->sum($column);
    }
}
