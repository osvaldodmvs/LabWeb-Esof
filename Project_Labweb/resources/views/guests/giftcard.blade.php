@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt=""
    style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            GIFT CARD
        </h1>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12 text-center" style="padding-top: 50px;padding-bottom: 50px; padding-left: 50px">
            <img src="{{ asset('storage/img/giftcard.png') }}"
            style="height:auto;max-width:inherit" alt="giftcard_img">
        </div>
        <div class="col-md-6 col-sm-12 text-center" style="padding-top: 50px;padding-bottom: 50px; padding-right: 50px">
            <div class="text-center">
                <h2 style="font-weight:700;margin-bottom:0px">
                    GIFT CARD
                </h2>
                <h3 style="font-weight:700;margin-top:0px">
                    {{ '5.00€ - 30.00€' }}
                </h3>
                <br>
                <hr>
                <br>
                <h6 class="product-desc">
                    O destinatário irá receber um email com o teu presente, basta contactar a loja
                    para reservar a experiência VR.
                    O Gift Card oferecido tem uma validade de 1 ano para utilização.
                </h6>
                <hr>
                <form action="{{route('cart_add_giftcard')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <?php
                    $date=date('d-m-Y');
                    ?>
                    <input type="hidden" name="id" value="G">
                    <input type="hidden" name="name" value="GIFTCARD">
                    <input type="hidden" name="quantity" value="1">
                <p class="page-subtitle" style="font-size:16px !important;padding-top:10px">ESCOLHA O VALOR</p>
                <select class="form-select text-center" name="price" aria-label="select-price"
                 style="width:200px;display:inline" id="selectHour">
                    <option value="5">5€</option>
                    <option value="10">10€</option>
                    <option value="15">15€</option>
                    <option value="20">20€</option>
                    <option value="25">25€</option>
                    <option value="30">30€</option>
                </select>
                </ul>
                <p class="page-subtitle" style="font-size:16px !important;padding-top:20px;">
                    ESCOLHA O DESTINATÁRIO (E-MAIL)</p>
                <input type="email" name="destiny" id="destiny" style="width:400px">
                <br>
                <button class="btn btn-primary m-3" type="submit">COMPRAR</button>
                </form>
                @if ($message = Session::get('error'))
                {{ $message }}
                @endif
            </div>
        </div>
    </div>
</div>

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>

@endsection