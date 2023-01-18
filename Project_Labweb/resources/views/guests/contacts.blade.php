@extends('layouts.app')

@section('content')

<div class="d-flex" style="height: 350px; margin-top:-50px;">
    <img src="{{ asset('/storage/img/cover_viral.jpg') }}" alt="" 
    style="flex-grow:1;off;max-width:100vw;height:auto;object-fit:cover">
</div>

<div class="d-flex justify-content-center align-items-center viral_blue_bg_color" style="height: 100px">
    <div class="text-center">
        <h1 class="page-title">
            CONTACTOS
        </h1>
    </div>
</div>

<div class="d-flex" style="height: 5px;background-color:#acd9ff"></div>

<div class="ratio ratio-21x9" style="height: 350px">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12015.8344738401
    12!2d-8.6225807!3d41.1572543!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2b7501f249a
    f5075!2sViral%20Virtual%20Reality!5e0!3m2!1spt-PT!2spt!4v1673216294037!5m2!1spt-PT
    !2spt" width="800" height="350px" style="border:0;" allowfullscreen="" loading="la
    zy" referrerpolicy="no-referrer-when-downgrade" title="map"></iframe>
</div>

@endsection