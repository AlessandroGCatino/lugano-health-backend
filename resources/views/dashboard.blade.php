@extends('layouts.app')

@section('title','La tua Dashboard')


@section('content')

<div id="dashboard" class="px-5 pb-5 pt-1 d-green-bg">

<hr class="my-0 mb-5">

    {{-- {{dd(session('doctor')->name)}} --}}
    
    <div class="row d-white-bg rounded-4 p-5 d-green-color">

        <!-- foto profilo -->
        <figure class="col-3 d-flex align-items-center justify-content-center">
            @if (session('doctor')->ProfilePic === null )
            <img class="img-fluid img-thumbnail rounded rounded-circle w-50" src="/userpicture.jpg" alt="ProfilePicture">
            
            @else
            
            <img class="img-fluid img-thumbnail rounded rounded-circle w-50 ms-auto ratio ratio-1x1 " src="{{ asset('/storage/' . session('doctor')->ProfilePic) }}" alt="ProfilePicture">
            
            @endif
        </figure>

        <div class="col-9 row">
            <div class="col-6">
                <h1 class="mt-2 fw-bold">Dott. {{session('doctor')->name}}</h1>
                <p class="mt-2">{{ session('doctor')->address }}</p>

                <!-- STARS -->
                <div>
                        <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                </div>

            </div>

            <!-- BUTTONS -->
            <div class="col-6 d-flex flex-column">

                <a class="btn btn-success mt-4" href="{{route("doctors.edit", session('doctor')->slug)}}">MODIFICA PROFILO</a>
                <a class="btn btn-success mt-4" href="{{route("messages.index", session('doctor'))}}">MESSAGGI RICEVUTI</a>
                <a class="btn btn-success mt-4" href="{{route("reviews.index", session('doctor')->id)}}">RECENSIONI</a>
                <a class="btn btn-success mt-4" href="{{route("sponsorizations.index")}}">SPONSORIZZAZIONI</a>
                <a class="btn btn-success mt-4" href="">STATISTICHE</a>

            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-4 gap-3 ">
    <h3 class="d-green-color">“Curare a volte, alleviare spesso, confortare sempre.”</h3>
    <p>-Ippocrate</p>
</div>

@endsection
