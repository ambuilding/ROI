@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Transaction</div>

                    <div class="panel-body">
                        <form method="POST" action="/">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="symbol_id">Choose a Symbol:</label>
                                <select name="symbol_id" id="symbol_id" class="form-control" required>
                                    <option value="">Choose One...</option>

                                    @foreach (\App\Symbol::all() as $symbol)
                                        <option value="{{ $symbol->id }}" {{ old('symbol') == $symbol->id ? 'selected' : '' }}>
                                            {{ $symbol->symbol }} {{ $symbol->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="dateTime">DateTime:</label>
                                <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" value="{{ old('dateTime') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="transaction">Choose a transaction:</label>
                                <select name="transaction" id="transaction" class="form-control" required>
                                    <option value="">Choose One...</option>
                                    <option value="BUY">BUY</option>
                                    <option value="SELL">SELL</option>
                                    <option value="HLI">HLI</option>
                                    <option value="HGU">HGU</option>
                                    {{-- {{ old('transaction') == HGU ? 'selected' : '' }} --}}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="shares">Share:</label>
                                <input type="number" class="form-control" id="shares" name="shares" value="{{ old('shares') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                            @if (count($errors))
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
