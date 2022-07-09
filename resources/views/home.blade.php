@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zamówienia') }}</div>

                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Nr</th>
                        <th>Produkt</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th>{{$order->product->id}}</th>
                            <th>{{$order->product->name}}</th>
                            <th>{{$order->status}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
