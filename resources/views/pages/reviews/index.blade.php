@extends('layouts.app')

@section('content')

<h1 class="mt-2 fw-bold">The reviews:</h1>

{{-- <a href="{{route('pages.reviews.create')}}" class="btn btn-primary d-block ms-auto">Add A New review</a>

<table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">review</th>
        <th scope="col">Slug</th>
      </tr>
    </thead>
    <tbody>

        @foreach ( $reviews as $item )
        <tr>
            <th>{{$item->id}}</th>
            <td><a href="{{route('pages.reviews.show', $item->slug)}}">{{$item->name}}</a></td>
            <td>{{$item->slug}}</td>
          </tr>
        @endforeach

    </tbody>
  </table> --}}
</div>
@endsection

