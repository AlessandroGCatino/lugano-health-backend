@extends('layouts.app')

@section('title','Il tuo profilo')

@section('content')
<div class="container">
    <h2>This is the profile of Dr. {{ $doctor->name }} {{ $doctor->surname }}</h2>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Doctor Details
            </div>
            <div class="card-body">
                <p class="card-text">Address: {{ $doctor->address }}</p>
                <p class="card-text">Phone Number: {{ $doctor->phone_number }}</p>
                <p class="card-text">Specializes in: </p>
            </div>
        </div>
    </div>
</div>


@endsection
