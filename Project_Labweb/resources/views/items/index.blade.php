@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<?php
use App\Models\Product;

?>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<ul class="list-group">
    <h2>Items (Marcações)</h2>
    <hr>
    @forelse ($items as $item)
    <li class="list-group-item p-1">
        <h6>ID: {{$item->id}} - {{(Product::findOrFail($item->product_id))->name}}
             na data {{$item->start_date}} até {{$item->end_date}} </h6>
        <a class="btn btn-primary btn-sm" href="{{url('items/show',$item->id)}}">Ver</a>
    </li>
    @empty
    <h5 class="text-center">Nao foram encontrados itens!</h5>
    @endforelse
</ul>
{!! $items->links('pagination::bootstrap-5') !!}
@endsection