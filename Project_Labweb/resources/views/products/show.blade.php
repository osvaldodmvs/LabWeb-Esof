@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="pull-left">
    <h2>Product information</h2>
    <hr>
</div>
<div class="row" id="row-2">
    <div class="col-xs-12 com-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {{ $product->name }}
            <br>
            <strong>Descrição:</strong>
            {{ $product->description }}
            <br>
            <strong>Preço:</strong>
            {{ $product->price }}€
            <br>
            <strong>Capacidade:</strong>
            {{ $product->capacity }}
            <br>
            <strong>Duração:</strong>
            {{ $product->duration }}
            <br>
            <strong>Imagem:</strong>
            <br>
            <img src="{{ asset('storage/img/'.$product->image) }}" style="max-width:200px" alt="">
            <br>
            <br>
            <strong>Is Pack:</strong>
            @if ($product->is_pack == 1)
            <button class="btn btn-sm btn-success"><i class="bi bi-check2"></i></button>
            @else
            <button class="btn btn-sm btn-danger"><i class="bi bi-x-lg"></i></button>
            @endif
        </div>
    </div>
</div>

<div class="row" id="row-1">
    <div class="col-lg 12 margin-tb">
        <div class="pull-right">
            <br>
            <a class="btn btn-primary btn-sm" href="{{ route('products_index') }}">Voltar</a>
        </div>
        <div class="pull-right py-3">
            <a class="btn btn-secondary btn-sm" href="{{url('products/edit',$product->id)}}">Editar</a>
        </div>
    </div>
</div>

@endsection