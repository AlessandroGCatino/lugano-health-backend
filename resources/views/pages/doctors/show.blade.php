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
                            <strong>Address:</strong> {{ $doctor->address }}
                        </div>

                        <div class="mb-3">
                            <strong>Phone Number:</strong> {{ $doctor->phone_number }}
                        </div>

                        <div class="mb-3">
                            <strong>Specializations:</strong>
                            @foreach($doctor->specializations as $specialization)
                                <span class="badge bg-secondary">{{ $specialization->name }}</span>
                            @endforeach
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('doctors.edit', $doctor->slug) }}" class="btn btn-warning me-md-2">Edit</a>

                            <form action="{{ route('doctors.destroy', $doctor->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
