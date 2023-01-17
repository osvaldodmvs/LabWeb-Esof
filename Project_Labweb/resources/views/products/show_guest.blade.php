@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt="" style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            {{ $product->name }}
        </h1>
    </div>
</div>

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-sm-12 text-center" style="padding-top: 50px;padding-bottom: 50px; padding-left: 50px">
            <img src="{{ asset('storage/img/'.$product->image) }}" style="height:auto;max-width:inherit">
        </div>
        <div class="col-md-6 col-sm-12 text-center" style="padding-top: 50px;padding-bottom: 50px; padding-right: 50px">
            <div class="text-center">
                <h2 style="font-weight:700;margin-bottom:0px">
                    {{ $product->name }}
                </h2>
                <h3 style="font-weight:700;margin-top:0px">
                    {{ '€'.$product->price }}
                </h3>
                <br>
                <hr>
                <br>
                <h6 class="product-desc">
                    {{ $product->description }}
                </h6>
                <hr>
                <form action="{{route('cart_add')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <input type="hidden" name="name" value="{{$product->name}}">
                    <input type="hidden" name="price" value="{{$product->price}}">
                    <input type="hidden" name="capacity" value="{{$product->capacity}}">
                <p class="page-subtitle" style="font-size:16px !important;padding-top:10px">ESCOLHA A DATA</p>
                <select class="form-select" name="day" aria-label="select-day" style="margin-top:20px" id="selectDay">
                    @forelse ($week as $day)
                    <option value="{{$day}}">{{$day}}</option>
                    @empty
                    @endforelse
                </select>
                <p class="page-subtitle" style="font-size:16px !important;padding-top:30px">ESCOLHA A HORA</p>
                <select class="form-select" name="hour" aria-label="select-hour" style="margin-top:20px" id="selectHour">
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                </select>
                </ul>
                <input type="number" name="quantity" id="" max="{{$product->capacity}}" min="1" placeholder="1">
                <button class="btn btn-primary m-3" type="submit">RESERVAR</button>
                </form>
                @if ($message = Session::get('error'))
                {{ $message }}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection