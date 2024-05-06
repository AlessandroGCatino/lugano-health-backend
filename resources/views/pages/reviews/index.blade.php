@extends('layouts.app')

@section('content')

<div class="container">

  <h1 class="mt-2 fw-bold">Le tue recensioni</h1>
    
  <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th class="col-3">Nome Utente</th>
          <th>Recensione</th>
          <th>Lasciata il</th>
        </tr>
      </thead>
      <tbody>
  
          @foreach ( $reviews as $item )
          <tr>
              <td>{{$item->user_name}}</td>
              <td>{{ $item->comment }}</td>
              <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F Y') }}</td>
            </tr>
          @endforeach
  
      </tbody>
    </table>
  </div>
</div>

@endsection

