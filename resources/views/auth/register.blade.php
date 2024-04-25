@extends('layouts.app')

@section('title','Registrazione profilo')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                        <form method="POST" action="{{ route('register') }}" id="registrationForm">
                            @csrf

                            <div class="card">

                                <div class="card-header fw-bold">{{ __('Registrati') }}</div>
                                <div class="card-body">

                                    <div class="mb-4 row">
                                        <label for="email"
                                            class="col-md-4 col-form-label text-md-right">
                                            <span>{{ __('E-Mail Address') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-8">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" autocomplete="email" maxlength="255" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="password"
                                            class="col-md-4 col-form-label text-md-right">
                                            <span>{{ __('Password') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-8">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="password-confirm"
                                            class="col-md-4 col-form-label text-md-right">

                                            <span>{{ __('Conferma la password') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <div class="card mt-3">

                                <div class="card-header fw-bold">Informazioni personali</div>
                                <div class="card-body">

                                    <div class="mb-4 row">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-right">

                                            <span>{{ __('Nome') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-8">
                                            <input id="firstname" type="text"
                                                class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                                value="{{ old('firstname') }}" required autocomplete="firstname" autofocus
                                                maxlength="255">

                                            @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="lastname"
                                            class="col-md-4 col-form-label text-md-right">

                                            <span>{{ __('Cognome') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-8">
                                            <input id="lastname" type="text"
                                                class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                                value="{{ old('lastname') }}" required autocomplete="lastname" autofocus
                                                maxlength="255">

                                            @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="address"
                                            class="col-md-4 col-form-label text-md-right">

                                            <span>{{ __('Indirizzo') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-8">
                                            <input id="address" type="text"
                                                class="form-control @error('address') is-invalid @enderror" name="address"
                                                value="{{ old('address') }}" required autocomplete="address" autofocus
                                                maxlength="255">

                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="phone_number"
                                            class="col-md-4 col-form-label text-md-right">

                                            <span>{{ __('Numero di telefono') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>

                                        <div class="col-md-8">
                                            <input id="phone_number" type="text"
                                                class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                                value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus
                                                maxlength="10" minlength="10">

                                            @error('phone_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="mb-4 row">
                                        <label for='specializations' class="col-md-4 col-form-label text-md-right">

                                            <span>{{ __('Specializzazioni') }}</span>
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <select multiple name="specializations[]" id="specializations"
                                                class="form-select @error('specializations') is-invalid @enderror">

                                                <option value="">Select One Or More</option>

                                                @forelse ($specializations as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == old('specialization_id') ? 'selected' : '' }}>{{ $item->name }}
                                                    </option>
                                                @empty
                                                    <option value="">There are no specializations</option>
                                                @endforelse

                                            </select>
                                            @error('specializations->name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="mb-4 row">
                                        <label for="CV" class="col-md-4 col-form-label text-md-right">CV (PDF, DOC, DOCX):</label>

                                        <div class="col-md-8">
                                            <input type="file" class="form-control" id="CV" name="CV">
                                        </div>

                                        @error('CV')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="profile_pic" class="col-md-4 col-form-label text-md-right">Profile Picture:</label>

                                        <div class="col-md-8">
                                            <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                                        </div>

                                        @error('profile_pic')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>


                            </div>







                            <div class="mb-4 row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                        </form>

            </div>
        </div>
    </div>
@endsection
