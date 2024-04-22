@extends('layouts.app')

@section("content")

<div class="container mt-3 ">
    <h1 class="mb-3">Crea nuovo Dottore</h1>

    {{ dd($user)}}

    @if ($errors->any())
        <div class="alert alert-danger ">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route("doctors.store")}}" method="POST" enctype="multipart/form-data">

        @csrf
    
        <div class="mb-3">
            <label for="title" class="form-label">Nome</label>
            <input
                type="text"
                class="form-control"
                name="title"
                id="title" placeholder="{{ $user->name }}"/>
        </div>

        
        
    
        <button
            type="submit"
            class="btn btn-primary"
        >
            Crea
        </button>
        
    </form>

</div>

@endsection