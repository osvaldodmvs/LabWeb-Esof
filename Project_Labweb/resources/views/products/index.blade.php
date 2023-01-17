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
    <h2>Productos</h2>
    <hr>
    @forelse ($products as $product)
    <li class="list-group-item p-1">
        <h6>{{$product->name}}</h6>
        <form action="{{url('products/destroy/'.$product->id)}}" method="post">
            <a class="btn btn-primary btn-sm" href="{{url('products/show',$product->id)}}">Ver</a>
            <a class="btn btn-secondary btn-sm" href="{{url('products/edit',$product->id)}}">Editar</a>
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"><strong>Apagar</strong></button>
        </form>
    </li>
    @empty
    <h5 class="text-center">Não foram encontrados produtos!</h5>
    @endforelse
</ul>
{!! $products->links('pagination::bootstrap-5') !!}
@endsection