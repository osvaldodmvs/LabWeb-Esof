@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-lg 12 margin-tb">
        <div class="pull-left">
            <h2>Criar Produto</h2>
            <hr>
        </div>
    </div>
</div>
<div id="create">
    <form action="{{url('/product')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name"><strong>Nome:</strong></label>
            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description"><strong>Descrição:</strong></label>
            <input type="text" name="description" id="description" value="{{old('description')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="price"><strong>Preço:</strong></label>
            <input type="number" name="price" id="price" value="{{old('price')}}" class="form-control" min="1" step="0.01">
        </div>
        <div class="form-group">
            <label for="capacity"><strong>Capacidade:</strong></label>
            <input type="number" name="capacity" id="capacity" value="{{old('capacity')}}" class="form-control" min="1" max="10">
        </div>
        <div class="form-group">
            <label for="duration"><strong>Duração:</strong></label>
            <input type="number" name="duration" id="duration" value="{{old('duration')}}" class="form-control" min="1" max="60">
        </div>
        <div class="form-group py-3">
            <input type="hidden" name="image" value="temporary_name">
            <input type="file" name="image_file" placeholder="Choose Image" id="image_file" class="form-control">
            @error('image_file')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="is_pack"><strong>É Pack:</strong></label>
            <br>
            <div class="form-check">
                <input type="hidden" name="is_pack" value="0">
                <input type="checkbox" class="form-check-input" name="is_pack" value="1">
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{$message}}</p>
    </div>
    @endif
</div>
@endsection