@extends('layouts.app')

@section('content')


<h1 class="mt-2 fw-bold">The sponsorizations:</h1>

{{-- <a href="{{route('pages.sponsorizations.create')}}" class="btn btn-primary d-block ms-auto">Add A New sponsorization</a>

<table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">sponsorization</th>
        <th scope="col">Slug</th>
      </tr>
    </thead>
    <tbody>

        @foreach ( $sponsorizations as $item )
        <tr>
            <th>{{$item->id}}</th>
            <td><a href="{{route('pages.sponsorizations.show', $item->slug)}}">{{$item->name}}</a></td>
            <td>{{$item->slug}}</td>
          </tr>
        @endforeach

    </tbody>
  </table> --}}
</div>
@endsection
