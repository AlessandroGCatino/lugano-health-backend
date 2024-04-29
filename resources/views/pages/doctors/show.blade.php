@extends('layouts.app')

@section('title','Il tuo profilo')

@section('content')
  <div class="container">
    <h2>questo è il tuo profilo (show)</h2>

    <a href="{{route('doctors.edit', $doctor->slug)}}" class="btn btn-primary">EDIT</a>



  </div> 

@endsection
