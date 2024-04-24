@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>questo è il tuo profilo (show)</h2>

        {{-- <a class='btn btn-primary' href='{{route('doctors.edit', $doctor->id)}}">EDIT</a> --}}

        <a href="{{route('doctors.edit', $doctor->id)}}" class="btn btn-primary">EDIT</a>


        {{-- <h1 class="mt-2 fw-bold">{{ $doctors->name }}</h1>

        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('pages.doctors.edit', $doctors->slug) }}" class="btn btn-warning">EDIT</a>

            <form action="{{ route('pages.doctors.destroy', $doctors->slug) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    DELETE
                </button>
            </form>
        </div> --}}
    </div>


@endsection
