@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-lg 12 margin-tb">
        <div class="pull-left">
            <h2>Edit User Information</h2>
            <hr>
        </div>
</div>
</div>

<form action="{{url('users/update/'.$user->id)}}" method="post" id="update_form">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Apelido:</strong>
                <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" placeholder="Last Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Endereço:</strong>
                <input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="Address">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telemóvel:</strong>
                <input type="tel" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="912345678">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Saldo:</strong>
                <input type="text" name="balance" value="{{ $user->balance }}" class="form-control" placeholder="Balance">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>É Administrador:</strong>
            <div class="form-check">
                <input type="hidden" name="is_admin" value="0">
                <input type="checkbox" class="form-check-input" name="is_admin" {{$user->is_admin == 1 ? 'checked' : null}} value="1">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection