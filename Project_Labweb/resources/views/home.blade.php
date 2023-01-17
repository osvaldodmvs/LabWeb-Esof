@extends('layouts.app')

@section('content')

<div class="ratio ratio-16x9">
    <video id="bgvid" autoplay loop muted>
        <source src="/storage/videos/homepage_opening.mp4" type="video/mp4">
    </video>
</div>

<div class="d-flex justify-content-center align-items-center">
    <div class="text-center" style="width:100%">
        <h1 class="page-subtitle" style="margin-top:40px">
            GO VIRAL</h1>
        <h6 class="page-subtitle-2" style="font-size:21px;margin-bottom:50px">
            O MELHOR CENTRO DE REALIDADE VIRTUAL DE PORTUGAL
        </h6>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center" >
    <div class="container text-center">
        <h6 class="text-subtitle" style="padding-right:50px;padding-left:50px;font-size:20px">
            A Viral Virtual Reality é um centro de entretenimento de 300m2 de jogos e simulação com tecnologia
            de realidade virtual. Situada no centro da cidade do Porto disponibiliza experiências de realidade
            virtual de alta tecnologia com sensações únicas de divertimento e jogos desafiadores.
        </h6>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center" style="margin-bottom:40px">
    <a href="{{ route('viral') }}"><button class="btn btn-blue-dark" style="padding:10px;margin:10px;width:140px"><i class="bi bi-star-fill"></i>  VIRAL VR</button> </a>
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px;padding-top:70px">
    <div class="text-center">
        <h2 class="page-title" style="font-weight:800">
            RESERVA JÁ A TUA EXPERIÊNCIA VR
        </h2>
        <h3 class="page-subtitle" style="color:white;font-weight:400;font-size:20px;letter-spacing:0">
            ESCOLHE UMA EXPERIÊNCIA VR, AGENDA E CONFIRMA A TUA RESERVA
        </h3>
        
    </div>
</div>

<div class="container-fluid viral_blue_bg_color" style="padding-bottom: 50px;padding-top: 50px;width:100%">
    <div class="row justify-content-md-center text-center">
        @forelse ($products as $product)
        @if ($product->is_pack==0)
        <div class="col">
            <a href="{{url('products',$product->id)}}">
                <img src="{{ asset('storage/img/'.$product->image) }}" alt="{{$product->name}}" class="py-3 px-0" style="width:280px">
            </a>
        </div>
        @endif
        @empty
        @endforelse
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <div class="text-center" style="width:100%">
        <h1 class="page-subtitle" style="margin-top:40px">
            PACKS E PROMOÇÕES
        </h1>
        <h6 class="text-viral" style="font-weight:400; font-size:1.5em">
            OPURTUNIDADES E VANTAGES A NÃO PERDER
        </h6>
    </div>
</div>

<div class="container-fluid" style="margin-bottom:30px">
    <div class="row justify-content-center text-center">
        <div class="col-md-3">
            <a href="{{route('giftcard_show_guest')}}">
                <img src="{{ asset('storage/img/giftcard.png') }}" alt="giftcard" class="py-3" style="max-width:100%;height:auto">
            </a>
            <p class="product-name">GIFTCARD</p>
            <p class="product-price">€5.00 - €25.00</p>
        </div>
        @forelse ($products as $product)
        @if ($product->is_pack==1)
        <div class="col-md-3">
            <a href="{{url('products',$product->id)}}">
                <img src="{{ asset('storage/img/'.$product->image) }}" alt="{{$product->name}}" class="py-3" style="max-width:100%;height:auto">
            </a>
            <p class="product-name">{{$product->name}}</p>
            <p class="product-price">€{{$product->price}}</p>
        </div>
        @endif
        @empty
        @endforelse
    </div>
</div>

<div class="d-flex justify-content-center align-items-center">
    <div class="text-center" style="width:100%">
        <h1 class="page-subtitle" style="margin-top:40px">
            VIRTUAL EM SEGURANÇA
                </h1>
        <h6 class="text-viral" style="font-weight:400; font-size:20px">
            MEDIDAS COVID E CERTIFICAÇÃO CLEAN & SAFE
        </h6>
    </div>
</div>


<div class="d-flex flex-wrap" style="margin-top:50px">
    <div class="col-md-6" style="max-width: 100%; max-height: 100%;">
        <img src="{{ asset('storage/img/covid.jpg') }}" alt="covid" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
    </div>
    <div class="col-md-6 d-flex align-items-center text-white viral_blue_bg_color">
        <div>
            <h2 style="font-weight: 600; text-align: center;">NA VIRAL VR FAZEMOS OS MÁXIMOS ESFORÇOS PARA A TUA SEGURANÇA</h2>
            <ul style="text-align: center;">
                <li>Formação aos funcionários</li>
                <li>Aumento da frequência de limpeza.</li>
                <li>Frequente arejamento do amplo espaço.</li>
                <li>Desinfecção realizada após cada utilização.</li>
                <li>Actualização das normas Clean & Safe.</li>
            </ul>
        </div>
    </div>
</div>

@endsection

