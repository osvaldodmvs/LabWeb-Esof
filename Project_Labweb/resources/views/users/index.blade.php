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
<ul class="list-group">
    <h2>Users</h2>
    <hr>
    @forelse ($users as $user)
    <li class="list-group-item p-1">
        <h6>{{$user->name}} {{$user->last_name}} - {{$user->email}} </h6>
        <form action="{{url('users/destroy/'.$user->id)}}" method="post">
            <a class="btn btn-primary btn-sm" href="{{url('users/show',$user->id)}}">Ver</a>
            <a class="btn btn-secondary btn-sm" href="{{url('users/edit',$user->id)}}">Editar</a>
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"><strong>Apagar</strong></button>
        </form>
    </li>
    @empty
    <h5 class="text-center">Não foram encontrados utilizadores!</h5>
    @endforelse
</ul>
{!! $users->links('pagination::bootstrap-5') !!}
@endsection