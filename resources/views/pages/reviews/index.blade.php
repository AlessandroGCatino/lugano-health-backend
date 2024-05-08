@extends('layouts.app')

@section('content')

<div class="container">

  <h1 class="mt-2 fw-bold">Le tue recensioni</h1>
    
  <div class="table-responsive mt-4">
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="col">Nome Utente</th>
          <th class="col">Recensione</th>
          <th class="col">Lasciata il</th>
        </tr>
      </thead>
      <tbody>
  
          @foreach ( $reviews as $item )
          <tr>
              <td>{{$item->user_name}}</td>
              <td class="review-text">{{ $item->comment }}</td>
              <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}</td>
            </tr>
          @endforeach
  
      </tbody>
    </table>
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
