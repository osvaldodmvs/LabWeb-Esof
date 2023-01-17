@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<?php
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
?>
<div class="pull-left">
    <h2>Informação sobre item (reserva)</h2>
    <hr>
</div>
<div class="row" id="row-2">
    <div class="col-xs-12 com-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID:</strong>
            {{ $item->id }}
            <br>
            <strong>ID da encomenda:</strong>
            {{ $item->order_id }}
            <br>
            <strong>Nome do cliente:</strong>
            {{ User::findOrFail(Order::findOrFail($item->order_id)->user_id)->name}} {{ User::findOrFail(Order::findOrFail($item->order_id)->user_id)->last_name}}
            <br>
            <strong>Produto:</strong>
            {{ Product::findOrFail($item->product_id)->name }}
            <br>
            <strong>Data de início:</strong>
            {{ $item->start_date }}
            <br>
            <strong>Data de fim:</strong>
            {{ $item->end_date }}
            <br>
        </div>
    </div>
</div>

<div class="row" id="row-1">
    <div class="col-lg 12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary btn-sm" href="{{ route('items_index') }}">Voltar</a>
        </div>
    </div>
</div>

@endsection