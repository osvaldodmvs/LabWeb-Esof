@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-lg 12 margin-tb">
        <div class="pull-left">
            <h2>Create User</h2>
            <hr>
        </div>
    </div>
</div>
<div id="create">
    <form action="{{url('/users')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name"><strong>Nome:</strong></label>
            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="last_name"><strong>Apelido:</strong></label>
            <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="name"><strong>Endereço:</strong></label>
            <input type="text" name="address" id="address" value="{{old('address')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="name"><strong>Telemóvel:</strong></label>
            <input type="tel" name="phone" id="phone" value="{{old('phone')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="email"><strong>Email:</strong></label>
            <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="name"><strong>Password:</strong></label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="balance"><strong>Saldo:</strong></label>
            <input type="text" name="balance" id="balance" value="{{old('balance')}}" class="form-control">
        </div>
        <div class="form-group">
            <label for="is_admin"><strong>É Administrador:</strong></label>
            <br>
            <div class="form-check">
                <input type="hidden" name="is_admin" value="0">
                <input type="checkbox" class="form-check-input" name="is_admin" value="1">
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Criar</button>
    </form>
    @if ($message = Session::get('error'))
    <div class="alert alert-error">
        <p>{{ $message }}</p>
    </div>
    @endif
</div>
@endsection