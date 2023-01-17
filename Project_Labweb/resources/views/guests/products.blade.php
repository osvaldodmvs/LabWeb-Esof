@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt="" style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            PRODUTOS
        </h1>
    </div>
</div>

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>

<div class="d-flex justify-content-center align-items-center" style="height: 100px;margin-top: 30px">
    <div class="text-center">
        <h1 class="page-subtitle">
            EXPERIÊNCIAS VR
        </h1>
        <h6 class="text-viral">
            ESCOLHE E RESERVA A TUA EXPERIÊNCIA VR
        </h6>
    </div>
</div>

<div class="container">
    <div class="row justify-content-md-center text-center">
        @forelse ($products as $product)
        @if ($product->is_pack==0)
        <div class="col-md-4">
            <a href="{{url('products',$product->id)}}">
                <img src="{{ asset('storage/img/'.$product->image) }}" alt="{{$product->name}}" class="py-3" style="width:300px;height:332px">
            </a>
            <p class="product-name">{{$product->name}}</p>
            <p class="product-price">€{{$product->price}}</p>
        </div>
        @endif
        @empty
        @endforelse
    </div>
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px;margin-top:30px">
    <div class="text-center">
        <h2 class="page-title">
            COMO RESERVAR
        </h2>
    </div>
</div>

<div class="container-fluid viral_blue_bg_color" style="padding-bottom: 50px">
    <div class="row row-cols-md-4 text-center">
        <div class="col col-p">
            <h1><i class="bi bi-bullseye icon_color"></i></h1>
            <h3 class="text-white" style="font-weight: 600">ESCOLHE</h3>
            <p class="text-transparent">A tua Experiência VR dos vários equipamentos de topo disponíveis, cada com diferentes jogos à tua liberdade de escolha.</p>
        </div>
        <div class="col col-p">
            <h1><i class="bi bi-calendar-week icon_color"></i></h1>
            <h3 class="text-white" style="font-weight: 600">AGENDA</h3>
            <p class="text-transparent">Na Experiência selecionada podes ver qual o equipamento, e jogos. Escolhe a data para verificar diponibilidade de horário e agenda.</p>
        </div>
        <div class="col col-p">
            <h1><i class="bi bi-check-circle icon_color"></i></h2>
            <h3 class="text-white" style="font-weight: 600">CONFIRMA</h3>
            <p class="text-transparent">Efetua o pagamento de forma simples e segura para confirmar a reserva. Vais receber no teu email todas as informações.</p>
        </div>
        <div class="col col-p">
            <h1><i class="bi bi-star-fill icon_color"></i></h1>
            <h3 class="text-white" style="font-weight: 600">GO VIRAL</h3>
            <p class="text-transparent">Comparece 15 minutos antes da data de agendamento, teremos tudo preparado para a tua entrada no mundo Virtual.</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center align-items-center" style="height: 100px; margin-top:30px">
    <div class="text-center">
        <h1 class="page-subtitle">
            PACKS E PROMOÇÕES
        </h1>
        <h6 class="text-viral">
            OPORTUNIDADES E VANTAGENS A NÃO PERDER
        </h6>
    </div>
</div>

<div class="container" style="margin-bottom:30px">
    <div class="row justify-content-md-center text-center">
        <div class="col">
            <a href="{{route('giftcard_show_guest')}}">
                <img src="{{ asset('/storage/img/giftcard.png') }}" alt="giftcard" class="py-3" style="width:300px;height:332px">
            </a>
            <p class="product-name">GIFTCARD</p>
            <p class="product-price">€5.00 - €25.00</p>
        </div>
        @forelse ($products as $product)
        @if ($product->is_pack==1)
        <div class="col">
            <a href="{{url('products',$product->id)}}">
                <img src="{{ asset('storage/img/'.$product->image) }}" alt="{{$product->name}}" class="py-3" style="width:300px;height:332px">
            </a>
            <p class="product-name">{{$product->name}}</p>
            <p class="product-price">€{{$product->price}}</p>
        </div>
        @endif
        @empty
        @endforelse
    </div>
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="padding-top:30px">
    <div class="text-center">
        <h1 class="page-title">
            MAIS INFORMAÇÕES OU DÚVIDAS
        </h1>
        <h6 class="text-grey">
            CONSULTA A NOSSA PÁGINA FAQ OU ENTRA EM CONTACTO COM A VIRAL
        </h6>
        <br>
        <a href="{{ route('faq') }}" class="btn btn-light btn-light-blue" role="button"><i class="bi bi-question-lg"></i>FAQ</a>
        <br>
        <br>
        <a href="{{ route('contacts') }}" class="btn btn-light btn-light-blue" role="button"><i class="bi bi-arrow-up-right"></i> CONTACTO</a>
    </div>
</div>


@endsection