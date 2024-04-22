@extends('layouts.app')

@section('content')

<h1 class="mt-2 fw-bold">The votes:</h1>

{{-- <a href="{{route('pages.votes.create')}}" class="btn btn-primary d-block ms-auto">Add A New vote</a>

<table class="table table-striped mt-4">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">vote</th>
        <th scope="col">Slug</th>
      </tr>
    </thead>
    <tbody>

        @foreach ( $votes as $item )
        <tr>
            <th>{{$item->id}}</th>
            <td><a href="{{route('pages.votes.show', $item->slug)}}">{{$item->name}}</a></td>
            <td>{{$item->slug}}</td>
          </tr>
        @endforeach

    </tbody>
  </table> --}}
</div>
@endsection

