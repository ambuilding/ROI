<?php

namespace App\Http\Controllers;

use App\Symbol;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

	public function index(Symbol $symbol)
	{
		if ($symbol->exists) {
	        $transactions = $symbol->transactions()->get();
	    } else {
	        $transactions = Transaction::all();
	    }
		//dd($transactions->toSql());
		//return $transactions;
		return view('transactions.index', compact('transactions'));
	}

	public function create()
	{
		return view('transactions.create');
	}

	public function store(Request $request)
	{
		$price = request('shares') ? request('amount') / request('shares') : 0;
		//dd($price);

		$sum = DB::table('transactions')->where('symbol_id', request('symbol_id'))->sum('amount') + request('amount');
		$total = DB::table('transactions')->where('symbol_id', request('symbol_id'))->sum('shares') + request('shares');
		$cost = $sum / $total;

		$transaction = Transaction::create([
            'user_id' => auth()->id(),
            'symbol_id' => request('symbol_id'),
            'dateTime' => request('dateTime'),
            'transaction' => request('transaction'),
            'shares' => request('shares'),
            'amount' => request('amount'),
            'price' => $price,
            'total' => $total,
            'sum' => $sum,
            'cost' => $cost
        ]);

		return redirect('/');
	}
}
