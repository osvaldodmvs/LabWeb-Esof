@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt="" 
    style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            CHECKOUT
        </h1>
    </div>
</div>

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>

@if ($message = Session::get('error'))
    <div class="alert alert-danger p-3 my-3">
        {{ $message }}
    </div>
@endif

<div class="container text-center">
<table class="table" aria-labelledby="tabela-checkout">
    <thead style="padding-right: 400px;padding-left:540px">
		<tr>
        	<th scope="col">Produto</th>
        	<th scope="col">Data</th>
        	<th scope="col">Quantidade</th>
        	<th scope="col">Valor</th>
            <th scope="col"></th>
      	</tr>
    </thead>
    <tbody></tbody>
        @forelse($items as $item)
        <?php
        ?>
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->attributes->start_date}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->price * $item->quantity}}€</td>
            <td></td>
        </tr>
        @empty
        @endforelse
    </tbody>
  	</table>
	<br>
    <hr>
    <h3>TOTAL : {{\Cart::getTotal()}}€</h3>
    <br>
    <br>
</div>

<div class="container py-3" style="width:500px!important;background-color:#acd9ff; border-radius:10px;">
    <form action="{{route('pay')}}" method="post" id="payment-form">
        @csrf
        <input id="card-holder-name" type="text" placeholder="Nome no cartão" name="card-holder-name">
 
        <!-- Stripe Elements Placeholder -->
        <div id="card-element" style="background-color:white;border-radius:5px;height:30px;padding-top:5px;
        padding-bottom:5px;margin-top:5px;margin-bottom:5px"></div>
 
        <button id="card-button" class="btn btn-success m-0" data-secret="{{ $intent->client_secret }}">
            Processar Pagamento
        </button>
    </form>
</div>
 
<script>
    const stripe = Stripe('{{env('STRIPE_KEY')}}');
    const elements = stripe.elements();
    const card = elements.create('card');
    const cardHolderName = document.getElementById('card-holder-name');
    card.mount('#card-element');

    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        console.log("attempting");
        e.preventDefault();

        //const total = {{\Cart::getTotal()}};

        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method:{
                    card: card,
                    billing_details:{
                        name: cardHolderName.value
                    }
                }
            });

        if(error){
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        }else
        paymentMethodHandler(setupIntent.payment_method);
        });

    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }

</script>

@endsection