@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-lg 12 margin-tb">
        <div class="pull-left">
            <h2>Editar Informatação do Produto</h2>
            <hr>
        </div>
</div>
</div>

<form action="{{url('products/update/'.$product->id)}}" method="post" id="update_form" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="Description">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço:</strong>
                <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="5.00" step="0.01">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Capacidade:</strong>
                <input type="number" name="capacity" value="{{ $product->capacity }}" class="form-control" placeholder="1,2...">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Duração:</strong>
                <input type="number" name="duration" value="{{ $product->duration }}" class="form-control" placeholder="10">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Imagem:</strong>
                <br>
                <img src="{{asset('storage/img/'.$product->image)}}" alt="" width="100px" height="100px">
                <br>
                <strong>Alterar Imagem:</strong>
                <input type="hidden" name="image" value="temporary_name">
                <input type="file" name="image_file" placeholder="Choose Image" id="image_file" class="form-control">
                @error('image_file')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>É Pack:</strong>
            <div class="form-check">
                <input type="hidden" name="is_pack" value="0">
                <input type="checkbox" class="form-check-input" name="is_pack" {{$product->is_pack == 1 ? 'checked' : null}} value="1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection