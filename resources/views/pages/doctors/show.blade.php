@extends('layouts.app')

@section('title', 'Your Profile')

@section('content')
    <div class="container">
        <h2>This is the profile of Dr. {{ $doctor->name }} {{ $doctor->surname }}</h2>

        <a href="{{ route('pages.doctors.edit', $doctor->slug) }}" class="btn btn-warning">EDIT</a>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    Doctor Details
                </div>
                <div class="card-body">
                    <p class="card-text">Address: {{ $doctor->address }}</p>
                    <p class="card-text">Phone Number: {{ $doctor->phone_number }}</p>
                </div>
            </div>
            <form action="{{ route('pages.doctors.destroy', $doctor->slug) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    DELETE
                </button>
            </form>
        </div>
    </div>
@endsection
