@extends('layouts.app')

@section('title','Accedi')

@section('content')

<div class="dash-container px-5 pb-5 pt-1 d-green-bg">
    
    <div class="row align-items-center mb-3">
        
        <hr class="my-0 col-10">
        <h2 class="fw-bold text-end s-yellow-color col-2">ACCEDI</h2>
        
    </div>
    
    <div class="d-white-bg rounded-4 p-5 pb-3 d-green-color">
        <form method="POST" action="{{ route('login') }}">
            @csrf
        
            <!-- MAIL -->
            <div class="mb-4 row">
                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail') }}</label>
        
                <div class="col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        
            <!-- PASSWORD -->
            <div class="mb-4 row">
                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
        
                <div class="col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        
            <!-- REMEMBER -->
            <div class="mb-4 row">
                <div class="mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
        
            <!-- BUTTON -->
            <div class="row">
                <button type="submit" class="btn btn-success mb-2 col-12 w-50 mx-auto">
                    {{ __('Login') }}
                </button>
        
                @if (Route::has('password.request'))
                <a class="btn btn-link col-12" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </form>

    </div>
    
</div>

<div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-4 gap-3">
    <h3 class="d-green-color">“Una gran parte di quello che i medici sanno è insegnato loro dai malati.”</h3>
    <p>-Marcel Proust</p>
</div>

@endsection
