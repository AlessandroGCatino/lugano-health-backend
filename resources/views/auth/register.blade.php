@extends('layouts.app')

@section('title', 'Registrazione profilo')

@section('content')

<div id="dashboard" class="px-5 pb-3 pt-1 d-green-bg">
    
    <div class="row align-items-center mb-3">
        
        <hr class="my-0 col-10">
        <h2 class="fw-bold text-end s-yellow-color col-2">REGISTRATI</h2>
        
    </div>
    
    <div class="d-white-bg rounded-4 p-5 d-green-color">

        <form method="POST" action="{{ route('register') }}" id="registrationForm" class="row" enctype="multipart/form-data">
            @csrf
            
            <!-- LEFT SIDE FORM -->
            <div class="col-6">
                <!-- NAME -->
                <div class="mb-4 row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">
                
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
                            
                            <ul id="firstnameErrorRequired" class="mt-1 alert alert-danger p-2 mb-1 d-none">
                                <li class='text-danger fw-bold ms-4'>Il nome è obbligatorio</li>
                        </ul>
                        
                        <ul id="firstnameErrorNumbers" class="alert alert-danger p-2 m-0 d-none">
                            <li class='text-danger fw-bold ms-4'>Non può contenere numeri</li>
                        </ul>
                    </div>
                </div>
                
                <!-- LASTNAME -->
                <div class="mb-4 row">
                    <label for="lastname" class="col-md-4 col-form-label text-md-right">
    
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
    
                        <ul id="lastnameErrorRequired" class="mt-1 alert alert-danger p-2 mb-1 d-none">
                            <li class='text-danger fw-bold ms-4'>Il cognome è obbligatorio</li>
                        </ul>
    
                        <ul id="lastnameErrorNumbers" class="alert alert-danger p-2 m-0 d-none">
                            <li class='text-danger fw-bold ms-4'>Non può contenere numeri</li>
                        </ul>
    
                    </div>
                </div>

                <!-- MAIL -->
                <div class="mb-4 row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">
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
    
                        <ul id="emailError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>L'indirizzo email è richiesto</li>
                        </ul>
                    </div>
                </div>
                
                <!-- PASSWORD -->
                <div class="mb-4 row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">
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
    
                        <ul id="pswError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>Devono essere presenti sia lettere minuscole,
                                maiuscole, numeri e caratteri speciali </li>
                        </ul>
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="mb-4 row">
    
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                        <span>{{ __('Conferma la password') }}</span>
                        <span class="text-danger">*</span>
                    </label>
    
                    <div class="col-md-8">
    
                        <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password">
    
                        <ul id="pswConfirmErrorSame" class="mt-1 alert alert-danger p-2 mb-1 d-none">
                            <li class='text-danger fw-bold ms-4'>Le password devono essere uguali</li>
                        </ul>
    
                        <ul id="pswConfirmErrorLength" class="alert alert-danger p-2 m-0 d-none">
                            <li class='text-danger fw-bold ms-4'>Le password devono essere della stessa
                                lunghezza</li>
                        </ul>
    
                    </div>
    
                </div>

            </div> 

            <!-- RIGHT SIDE FORM -->
            <div class="col-6 border-start border-success">

                <!-- ADDRESS -->
                <div class="mb-4 row">

                    <label for="address" class="col-md-4 col-form-label text-md-right">
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
                                <strong class="text-danger">{{ $message }}</strong>
                            </span>
                        @enderror
        
                        <ul id="addressError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>L'indirizzo è obbligatorio</li>
                            <li class='text-danger fw-bold ms-4'>Deve essere presente almeno un numero</li>
                        </ul>
        
                    </div>
                </div>

                <!-- PHONE NUMBER -->
                <div class="mb-4 row">

                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">
                        <span>{{ __('Numero di telefono') }}</span>
                        <span class="text-danger">*</span>
                    </label>
    
                    <div class="col-md-8">
                        <input id="phone_number" type="text"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            name="phone_number" value="{{ old('phone_number') }}" required
                            autocomplete="phone_number" autofocus maxlength="10" minlength="10">
    
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                        <ul id="phoneNumberError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>Il numero di telefono è obbligatorio</li>
                            <li class='text-danger fw-bold ms-4'>Devono essere presenti solo numeri</li>
                        </ul>
                    </div>
                </div>
                
                <!-- CV -->
                <div class="mb-4 row">
    
                    <label for="CV" class="col-md-4 col-form-label text-md-right">CV (PDF, DOC,
                        DOCX)</label>
    
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="CV" name="CV">
    
                        @error('CV')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                        <ul id="cvFileError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>Il file CV deve essere in formato PDF, DOC, o DOCX
                            </li>
                        </ul>
                    </div>
    
                </div>

                <!-- PROFILE PIC -->
                <div class="mb-4 row">
    
                    <label for="ProfilePic" class="col-md-4 col-form-label text-md-right">Profile
                        Picture:</label>
    
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="ProfilePic" name="ProfilePic">
    
                        @error('ProfilePic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                        <ul id="profilePicFileError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>La foto profilo deve essere in formato JPEG, JPG o PNG
                            </li>
                        </ul>
                    </div>
    
                </div>

            </div>

            <!-- BOTTOM FORM -->
            <div class="col-12 border-top border-success pt-4">

                <!-- SPECIALIZATIONS -->
                <div class="mb-4 row">
    
                    <label for='specializations' class="col-md-2 col-form-label text-md-right">
                        <span>{{ __('Specializzazioni') }}</span>
                        <span class="text-danger">*</span>
                    </label>
    
                    <div class="col-md-10">
                        <select multiple name="specializations[]" id="specializations"
                            class="form-select @error('specializations') is-invalid @enderror">
    
                            @forelse ($specializations as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == old('specialization_id') ? 'selected' : '' }}>
                                    {{ $item->name }}
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
    
                        <ul id="specializationsError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>Seleziona almeno una specializzazione</li>
                        </ul>
                    </div>
                </div>
                
                <!-- PERFORMANCES -->
                <div class="mb-4 row">
    
                    <label for="performances" class="col-md-2 col-form-label text-md-right">
                        <span>{{ __('Performance') }}</span>
                    </label>
    
                    <div class="col-md-10">
                        <textarea id="performances" class="form-control @error('performances') is-invalid @enderror" name="performances">{{ old('performances') }}</textarea>
    
                        @error('performances')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                    </div>
                </div>

            </div>

            <!-- BUTTON -->
            <button type="submit" class="btn btn-success mt-3">
                {{ __('REGISTRATI') }}
            </button>

        </form>

    </div>

    <h5 class="text-end s-yellow-color mt-4"><span class="text-danger">*</span> questi campi sono obbligatori</h5>
    
</div>



@endsection
