@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<?php
use App\Models\User;
use App\Models\Order;
?>
<div class="pull-left">
    <h2>Informação de pagamento</h2>
    <hr>
</div>
<div class="row" id="row-2">
    <div class="col-xs-12 com-sm-12 col-md-12">
        <div class="form-group">
            <strong>ID:</strong>
            {{ $payment->id }}
            <br>
            <strong>Encomenda associada:</strong>
            {{ $payment->order_id }}
            <br>
            <strong>Utilizador que efetuou encomenda:</strong>
            {{ (User::findOrFail(Order::findOrFail($payment->order_id)->user_id))->name }} {{ (User::findOrFail(Order::findOrFail($payment->order_id)->user_id))->last_name }}
            <br>
            <strong>Estado:</strong>
            {{ $payment->status }}
            <br>
            <strong>Valor:</strong>
            {{ $payment->value }}
            <br>
            <strong>Forma de pagamento:</strong>
            {{ $payment->method }}
            <br>
        </div>
    </div>
</div>

<div class="row" id="row-1">
    <div class="col-lg 12 margin-tb">
        <div class="pull-right">
            <br>
            <a class="btn btn-primary btn-sm" href="{{ route('payments_index') }}">Voltar</a>
        </div>
    </div>
</div>

@endsection