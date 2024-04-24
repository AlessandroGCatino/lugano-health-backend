@extends('layouts.app')

@section('content')


<h1 class="mt-2 fw-bold">The doctors:</h1>

{{-- <a href="{{route('pages.doctors.create')}}" class="btn btn-primary d-block ms-auto">Add A New doctor</a>

<table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">doctor</th>
        <th scope="col">Slug</th>
      </tr>
    </thead>
    <tbody>

        @foreach ( $doctors as $item )
        <tr>
            <th>{{$item->id}}</th>
            <td><a href="{{route('pages.doctors.show', $item->slug)}}">{{$item->name}}</a></td>
            <td>{{$item->slug}}</td>
          </tr>
        @endforeach

    </tbody>
  </table> --}}
</div>
@endsection


