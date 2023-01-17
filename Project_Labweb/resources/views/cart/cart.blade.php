@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt="" style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            CARRINHO
        </h1>
    </div>
</div>

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>
	
@if ($message = Session::get('error'))
    <div class="alert alert-danger p-3 my-3">
        {{ $message }}
    </div>
@endif

<div class="container">
<table class="table">
    <thead style="padding-right: 400px;padding-left:540px">
		<tr>
        	<th scope="col">Produto</th>
			<th scope="col">Data</th>
        	<th scope="col">Quantidade</th>
        	<th scope="col">Valor</th>
			<th scope="col"></th>
      	</tr>
    </thead>
    <tbody>
        @forelse($items as $item)
        <tr>
            <td>{{$item->name}}</td>
			<td>{{$item->attributes->start_date}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price * $item->quantity}}€</td>
            <td>
				<form action="{{route('cart_remove')}}" method="post">
					@csrf
					<input type="hidden" name="id" value="{{$item->id}}">
					<input type="hidden" name="actual_id" value="{{$item->attributes->item_id}}">
					<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
				</form>
			</td>
        </tr>
        @empty
        <h4 class="text-viral py-3">Não tem produtos no carrinho!</h4>
        @endforelse
    </tbody>
  	</table>
	<br>
	<div class="container">
		@if (!empty($item))
		<a class="btn btn-primary m-3" href="{{url('products',$item->attributes->product_id)}}">Voltar atrás</a>
		<a class="btn btn-danger m-3" href="{{route ('cart_clear') }}">Limpar carrinho</a>
		<a class="btn btn-success m-3" href="{{route ('checkout') }}">Finalizar compra</a>
		@else
		<a class="btn btn-primary m-3" href="{{url('products')}}">Voltar atrás</a>
		@endif
	</div>
</div>


@endsection