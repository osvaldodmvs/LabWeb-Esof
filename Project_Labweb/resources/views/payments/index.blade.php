@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
    <p>{{ $message }}</p>
</div>
@endif
<ul class="list-group">
    <h2>Pagamentos</h2>
    <hr>
    @forelse ($payments as $payment)
    <li class="list-group-item p-1">
        <h6>ID: {{$payment->id}} - {{$payment->value}}€ - Payment done by <u>{{$payment->method}}</u></h6>
        <a class="btn btn-primary btn-sm" href="{{url('payments/show',$payment->id)}}">Ver</a>
    </li>
    @empty
    <h5 class="text-center">Não foram encontrados pagamentos!</h5>
    @endforelse
</ul>
{!! $payments->links('pagination::bootstrap-5') !!}
@endsection