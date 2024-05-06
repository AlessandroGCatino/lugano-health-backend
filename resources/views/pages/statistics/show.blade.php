@extends('layouts.app')

@section('title', 'Your Profile')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header" style="background-color: #ffe600;">
                        <h2 class="mb-0">Dr. {{ $doctor->name }} {{ $doctor->surname }}</h2>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Via:</strong> {{ $doctor->address }}
                        </div>

                        <div class="mb-3">
                            <strong>Telefono:</strong> {{ $doctor->phone_number }}
                        </div>

                        <div class="mb-3">
                            <strong>Specializzazioni:</strong>
                            @foreach ($doctor->specializations as $specialization)
                                <span class="badge bg-secondary">{{ $specialization->name }}</span>
                            @endforeach
                        </div>

                        <p><strong>Numero di Pazienti Trattati:</strong> {{ $numeroPazienti }}</p>

                        <div class="mb-3">
                            <h4>Messaggi Ricevuti</h4>
                            @foreach ($doctor->messages as $message)
                                <div class="message">

                                    <p><strong>Da:</strong> {{ $message->name }} - {{ $message->email }}</p>
                                    <hr>
                                    <p>{{ $message->message }}</p>

                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
                            <h4>Commenti ricevuti</h4>
                            @foreach ($doctor->reviews as $review)
                                <div class="review">
                                    <p>{{ $review->user_name }}</p>
                                    <p>{{ $review->user_mail }}</p>
                                    <p><strong>commento:</strong> {{ $review->comment }}</p>
                                    <hr>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
