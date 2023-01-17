@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<?php
use App\Models\User;
?>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<ul class="list-group">
    <h2>Encomendas</h2>
    <hr>
    @forelse ($orders as $order)
    <li class="list-group-item p-1">
        <h6>{{$order->id}} - {{(User::findOrFail($order->user_id))->name}} {{(User::findOrFail($order->user_id))->last_name}} </h6>
        <a class="btn btn-primary btn-sm" href="{{url('orders/show',$order->id)}}">Ver</a>
    </li>
    @empty
    <h5 class="text-center">Nao foram encontradas encomendas!</h5>
    @endforelse
</ul>
{!! $orders->links('pagination::bootstrap-5') !!}
@endsection