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

  <div class="card mt-5 mb-3">
                    <div class="card-header">
                        <h2 class="fw-bold">Massimizza la Tua Visibilità</h2>
                    </div>
                    <div class="card-body ">
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                            @foreach ($sponsorizations as $element)
                                <div class="col ">
                                    <div class="card p-3 shadow my-4">
                                        <h3>{{ $element->name }}</h3>
                                        <p> {{ $element->description }} </p>
                                        <p><span class="fw-bold">Prezzo</span>: {{ $element->price }}€</p> 
                                        <p><span class="fw-bold">Durata</span>: {{ $element->durata }}h</p>
                                        <button class="btn rounded-pill btn-primary">
                                            Scegli
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                </div>

</div>
@endsection
