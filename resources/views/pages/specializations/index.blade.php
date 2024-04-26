@extends('layouts.app')

@section('content')


<div class="container">
    <h1 class="mt-2 fw-bold">The specializations:</h1>

    {{-- <a href="{{route('pages.specializations.create')}}" class="btn btn-primary d-block ms-auto">Add A New specialization</a>

    <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">specialization</th>
            <th scope="col">Slug</th>
          </tr>
        </thead>
        <tbody>

            @foreach ( $specialization as $item )
            <tr>
                <th>{{$item->id}}</th>
                <td><a href="{{route('pages.specializations.show', $item->slug)}}">{{$item->name}}</a></td>
                <td>{{$item->slug}}</td>
              </tr>
            @endforeach

        </tbody>
      </table> --}}
</div>
@endsection
