@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<?php
use App\Models\User;
use App\Models\Product;
?>
<div class="pull-left">
    <h2>Informação da encomenda</h2>
    <hr>
</div>
<div class="row" id="row-2">
    <div class="col-xs-12 com-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID:</strong>
            {{ $order->id }}
            <br>
            <strong>Utilizador que efetuou encomenda:</strong>
            {{(User::findOrFail($order->user_id))->name}} {{(User::findOrFail($order->user_id))->last_name}}
            <br>
            @foreach ($items as $item)
                <strong>Produto:</strong>
                {{ Product::findOrFail($item->product_id)->name }}
                <br>
                <strong>Quantidade:</strong>
                {{ $item->quantity }}
                <br>
                <strong>Preço total:</strong>
                {{ $item->total }}€
                <br>
                <strong>Data:</strong>
                {{ $item->start_date }}
                <br>
                <hr>
            @endforeach
        </div>
    </div>
</div>

<div class="row" id="row-1">
    <div class="col-lg 12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('orders_index') }}">Voltar</a>
        </div>
    </div>
</div>

@endsection