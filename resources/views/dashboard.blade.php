@extends('layouts.app')

<?php 
session_start();
$loggedDoctor = $_SESSION["loggedDoctor"];
?>

@section('content')
<div class="container">
    
    <div class="bg-primary text-white my-5 p-4 rounded-3 row">
        <h1 class="col-6">Welcome back dott. {{$loggedDoctor->surname}}</h1>

        <!-- foto profilo -->
        <figure class="col-6">
            <img class="img-fluid img-thumbnail rounded rounded-circle" src="{{ $loggedDoctor->ProfilePic ? $loggedDoctor->ProfilePic : '../../userpicture.jpg' }}" alt="ProfilePicture">
        </figure>
    </div>

    <h3>Pannello di Controllo</h3>

    <div class="d-flex justify-content-between">
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("doctors.edit", $loggedDoctor)}}">Informazioni Medico</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("messages.index", $loggedDoctor)}}">Messaggi Ricevuti</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("reviews.index", $loggedDoctor->id)}}">Recensioni Ricevute</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="{{route("sponsorizations.index")}}">Sponsorizzazioni</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Statistiche</a>
    </div>
</div>
@endsection
