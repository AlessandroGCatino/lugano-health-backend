@extends('layouts.app')

@section('content')
<div class="container">
  
  <h1 class="mt-4 mb-3 fw-bold">Le tue recensioni</h1>
  <div class="row mt-4 mb-5">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Da</th>
                  <th scope="col">Data</th>
                  <th scope="col">Email</th>
                  <th scope="col">Recensione</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $reviews as $item )
                  <tr>
                    <td class="text-capitalize">{{$item->user_name}}</td>
                    <td class="text-capitalize">{{ \Carbon\Carbon::parse($item->created_at)->locale('it')->isoFormat('D MMMM YYYY') }}</td>
                    <td>{{ $item->user_mail }}</td>
                    <td class="review-text">{{ $item->comment }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

<style>
    /* Gestisci il wrapping del testo lungo nelle recensioni */
    .review-text {
        max-width: 300px; /* Modifica la larghezza massima in base alle tue esigenze */
        overflow-wrap: break-word;
    }
</style>
