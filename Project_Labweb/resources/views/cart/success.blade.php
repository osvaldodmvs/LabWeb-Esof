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

@if ($message = Session::get('success'))
    <div class="container alert alert-success p-3 my-3" style="width:500px">
        {{ $message }}<br>
        Irá receber uma fatura no seu endereço de email.<br>Obrigado!
    </div>

    <!-- make a div to redirect to another page -->
    <div id="redirect" class="text-center">
        A redirecionar...
        <script>
            setTimeout(function() {
                window.location.href = '/'
            }, 2000); // 2 second
         </script>
    </div>
    
@endif

@endsection