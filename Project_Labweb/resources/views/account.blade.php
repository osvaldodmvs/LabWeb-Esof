@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h2>Informação do Utilizador</h2>
    <hr>
</div>
<div class="row" id="row-2">
    <div class="col-xs-12 com-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>
            {{ $user->name }} {{ $user->last_name }}
            <br>
            <strong>Endereço:</strong>
            {{ $user->address }}
            <br>
            <strong>Telemóvel:</strong>
            {{ $user->phone }}
            <br>
            <strong>Email:</strong>
            {{ $user->email }}
            <br>
            <strong>Saldo:</strong>
            {{ $user->balance }}€
            <br>
            <strong>É Administrador:</strong>
            @if ($user->is_admin == 1)
            <button class="btn btn-sm btn-success"><i class="bi bi-check2"></i></button>
            @else
            <button class="btn btn-sm btn-danger"><i class="bi bi-x-lg"></i></button>
            @endif
        </div>
    </div>
</div>

@endsection