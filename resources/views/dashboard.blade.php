@extends('layouts.app')

@section('title','La tua Dashboard')


<?php
?>

@section('content')
<div class="container">

    <div class="bg-primary text-white my-5 p-4 rounded-3 row">
        <h1 class="col-6">Welcome back dott. {{session('doctor')->name}}</h1>

        <!-- foto profilo -->
        <figure class="col-6">
            <img class="img-fluid img-thumbnail rounded rounded-circle" src="{{ session('doctor')->ProfilePic ? session('doctor')->ProfilePic : '../../userpicture.jpg' }}" alt="ProfilePicture">
        </figure>
    </div>

    <h3>Pannello di Controllo</h3>

    <div class="d-flex justify-content-between">
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("doctors.show", session('doctor'))}}">Informazioni Medico</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("messages.index", session('doctor'))}}">Messaggi Ricevuti</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("reviews.index", session('doctor')->id)}}">Recensioni Ricevute</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("sponsorizations.index")}}">Sponsorizzazioni</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Statistiche</a>
    </div>
</div>
@endsection
