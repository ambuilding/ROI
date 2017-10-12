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

	public function store()
	{
		$transaction = Transaction::create([
            'user_id' => auth()->id(),
            'symbol_id' => request('symbol_id'),
            'dateTime' => request('dateTime'),
            'transaction' => request('transaction'),
            'shares' => request('shares'),
            'amount' => request('amount'),
        ]);

		return redirect('/');
	}
}
