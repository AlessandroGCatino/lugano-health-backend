@extends('layouts.app')

@section('title', 'La tua Dashboard')

@section('content')

<div class="dash-container px-0 d-green-bg py-4">

    <hr class="my-0">

    <div class="container d-flex py-5">

        <div class="d-white-bg rounded-4 p-5 d-green-color mx-auto mx-md-4 mx-sm-4 col-lg-12">
            <div class="row py-4">
                <figure class="col-md-2 col-sm-3 d-flex align-items-center justify-content-center">
                    @if (session('doctor')->ProfilePic === null)
                    <img class="img-fluid img-thumbnail rounded rounded-circle" src="/userpicture.jpg" alt="ProfilePicture">
                    @else
                    <img class="img-fluid img-thumbnail rounded rounded-circle" src="{{ asset('/storage/' . session('doctor')->ProfilePic) }}" alt="ProfilePicture">
                    @endif
                </figure>
    
                <div class="col-md-4 col-sm-5 mb-4">
                    <h1 class="mt-2 fw-bold text-capitalize">Dott. {{ session('doctor')->surname }}</h1>
                    <p class="mt-2 text-capitalize">{{ session('doctor')->address }}</p>
                <div>
                        <h5>La tua media voti:</h5>
                        @for ($i = 0; $i < session('doctor')->voteRating; $i++)
                        <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" fill="coral" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        @endfor
                        <?php 
                        $blackstars = 5 - session('doctor')->voteRating;
                        ?>
                        @for ($i = 0; $i < $blackstars; $i++)
                        <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        @endfor
                </div>

                </div>
    
                <!-- BUTTONS -->
                <div class="col-md-6 col-sm-4">
                    <div class="d-flex flex-column align-items-start">
                        <a class="btn btn-success mb-3 w-100" href="{{ route("doctors.edit", session('doctor')->slug) }}">MODIFICA PROFILO</a>
                        <a class="btn btn-success mb-3 w-100" href="{{ route("messages.index", session('doctor')) }}">MESSAGGI RICEVUTI</a>
                        <a class="btn btn-success mb-3 w-100" href="{{ route("reviews.index", session('doctor')->id) }}">RECENSIONI</a>
                        <a class="btn btn-success mb-3 w-100" href="{{ route("sponsorizations.index") }}">SPONSORIZZAZIONI</a>
    
                    </div>
                </div>
            </div>
            
        </div>

    </div>

</div>

<div class="d-flex flex-column justify-content-center align-items-center mx-3 mt-4 mb-3 gap-3">
    <h3 class="d-green-color italic">“Curare a volte, alleviare spesso, confortare sempre.”</h3>
    <p>-Ippocrate</p>
</div>

@endsection