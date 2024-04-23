@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="bg-primary text-white my-5 p-4 rounded-3 row">
        <h1 class="col-6">Welcome back dott.Cognome</h1>

        <!-- foto profilo -->
        <figure class="col-6">
            <img src="" alt="">
        </figure>
    </div>

    <h3>Pannello di Controllo</h3>

    <div class="d-flex justify-content-between">
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Informazioni Medico</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Messaggi Ricevuti</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Recensioni Ricevute</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Sponsorizzazioni</a>
        <a class="bg-primary text-white my-3 py-5 px-4 rounded-3 row" href="">Statistiche</a>
    </div>
</div>
@endsection
