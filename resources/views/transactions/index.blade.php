@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Transaction</th>
                            <th>Date/Time</th>
                            <th>Symbol</th>
                            <th>Shares</th>
                            <th>Amount</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Sum</th>
                            <th>Cost</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->transaction }}</td>
                                <td>{{ $transaction->dateTime }}</td>
                                <td>{{ $transaction->symbol->symbol }}</td>
                                <td>{{ $transaction->shares }}</td>
                                <td>{{ $transaction->amount }}</td>
                                <td>{{ $transaction->price }}</td>
                                <td>{{ $transaction->total }}</td>
                                <td>{{ $transaction->sum }}</td>
                                <td>{{ $transaction->cost }}</td>
                            </tr>
                        @empty
                            <p class="text-center">You haven't recorded any transaction yet!</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
