@extends('layouts.app')

@section('content')

<div class="dash-container px-5 pb-5 pt-1 d-green-bg">
    
    <div class="row align-items-center mb-3">
        
        <hr class="my-0 col-10">
        <h2 class="fw-bold text-end s-yellow-color col-2">RESET PASSWORD</h2>
        
    </div>
    
    <div class="d-white-bg rounded-4 p-5 d-green-color mt-5">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        
        <form method="POST" action="{{ route('password.email') }}" class="row">
            @csrf
        
            <div class="mb-4 row">
                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('LA TUA E-MAIL') }}</label>
        
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <!-- BUTTON -->
            <button type="submit" class="btn btn-success mt-3">
                {{ __('MANDA LINK PER CAMBIARE PASSWORD') }}
            </button>

        </form>
    </div>
</div>

<div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-4 gap-3">
    <h3 class="d-green-color">"Il dottor Dieta, il dottor Quiete e il dottor Gioia sono i migliori medici del mondo."</h3>
    <p>-Jonathan Swift</p>
</div>

@endsection
