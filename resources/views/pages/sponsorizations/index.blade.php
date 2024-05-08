@extends('layouts.app')

@section('content')


@if ($sponsorList != null)
  <?php


  $ora = new DateTime();
  $endSponsor = DateTime::createFromFormat("Y-m-d H:i:s", $sponsorList->deadline);


  ?>

  @if ($ora<$endSponsor)

    <?php
    
    $data_originale = $sponsorList->deadline;
    $timestamp = strtotime($data_originale);
    $data_in_formato_italiano = date('d/m/Y', $timestamp);

    ?>

    <div class="alert alert-success">

      <h1 class="mt-3 text-center ">Sponsorizzazione attiva fino al {{$data_in_formato_italiano}}</h1>
    
    </div>
    @else
    
        <div class="alert alert-danger">
    
        <h1 class="mt-3 text-center ">Nessuna sponsorizzazione attiva</h1>
      
        </div>
    
    @endif
@else
    
        <div class="alert alert-danger">
    
        <h1 class="mt-3 text-center ">Nessuna sponsorizzazione attiva</h1>
      
        </div>
    
@endif


<div class="card mt-5 mb-3 container ">
  <div class="card-header">
      <h2 class="fw-bold">Massimizza la Tua Visibilità</h2>
  </div>
  <div class="card-body">
      <div class=" row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
              <div class="col h-100 ">
                  <div class="card p-3 shadow my-4 border ">
                      <h3>{{ $sponsorizations[0]->name }}</h3>
                      <p class="pb-4"> {{ $sponsorizations[0]->description }} </p>
                      <p><span class="fw-bold">Prezzo</span>: {{ $sponsorizations[0]->price }}€</p> 
                      <p><span class="fw-bold">Durata</span>: {{ $sponsorizations[0]->durata }}h</p>
                      <a href="{{route("token", $sponsorizations[0])}}" class="btn rounded-pill btn-primary">
                          <button class="btn ">
                              Scegli
                          </button>
                      </a>
                  </div>
              </div>
              <div class="col h-100">
                  <div class="card p-3 shadow my-4">
                      <h3>{{ $sponsorizations[1]->name }}</h3>
                      <p> {{ $sponsorizations[1]->description }} </p>
                      <p><span class="fw-bold">Prezzo</span>: {{ $sponsorizations[1]->price }}€</p> 
                      <p><span class="fw-bold">Durata</span>: {{ $sponsorizations[1]->durata }}h</p>
                      <a href="{{route("token2", $sponsorizations[1])}}" class="btn rounded-pill btn-primary">
                          <button class="btn">
                              Scegli
                          </button>
                      </a>
                  </div>
              </div>
              <div class="col h-100 ">
                  <div class="card-1 card p-3 shadow my-4">
                      <h3>{{ $sponsorizations[2]->name }}</h3>
                      <p> {{ $sponsorizations[2]->description }} </p>
                      <p><span class="fw-bold">Prezzo</span>: {{ $sponsorizations[2]->price }}€</p> 
                      <p><span class="fw-bold">Durata</span>: {{ $sponsorizations[2]->durata }}h</p>
                      <a href="{{route("token3", $sponsorizations[2])}}" class="btn rounded-pill btn-primary">
                          <button class="btn">
                              Scegli
                          </button>
                      </a>
                  </div>
              </div>
      </div>
  </div>
  
</div>
</div>
@endsection

<style>
</style>
