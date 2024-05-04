@extends('layouts.app')

@section('title','La tua Dashboard')


@section('content')
<div class="container">

    {{-- {{dd(session('doctor')->name)}} --}}

    <div class="bg-primary text-white my-5 p-4 rounded-3 row">
        <h1 class="col-6">Dott. {{session('doctor')->name}} {{session('doctor')->surname}}</h1>

        <!-- foto profilo -->
        <figure class="col-6 d-flex ">
            @if (session('doctor')->ProfilePic === null )
            <img class="img-fluid img-thumbnail rounded rounded-circle w-50" src="/userpicture.jpg" alt="ProfilePicture">
            
            @else
            
            <img class="img-fluid img-thumbnail rounded rounded-circle w-50 ms-auto ratio ratio-1x1 " src="{{ asset('/storage/' . session('doctor')->ProfilePic) }}" alt="ProfilePicture">
            
            @endif
        </figure>
    </div>

    <h3>Pannello di Controllo</h3>

    <div class="d-flex justify-content-between">
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("doctors.edit", session('doctor')->slug)}}">Informazioni Medico</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("messages.index", session('doctor')->slug)}}">Messaggi Ricevuti</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("reviews.index", session('doctor')->id)}}">Recensioni Ricevute</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("sponsorizations.index")}}">Sponsorizzazioni</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Statistiche</a>

        
    </div>
</div>
@endsection
