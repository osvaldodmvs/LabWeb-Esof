@extends('layouts.adminapp')

@section('sidebar')
    @include('dashboard.sidebar')
@endsection

@section('content')
    <div id="dashboard-home" class="text-center" style="padding-top: 100px">
        <h1>Bem vindo ao painel de controlo de administrador, {{Auth::user()->name}}</h1>
    </div>
@endsection