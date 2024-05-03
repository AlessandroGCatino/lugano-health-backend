@extends('layouts.app')

@section('title', 'Modifica il tuo profilo')

@section('content')

<div id="dashboard" class="px-5 pb-3 pt-1 d-green-bg">
    
    <div class="row align-items-center mb-3">

        <hr class="my-0 col-8">
        <h2 class="fw-bold text-end s-yellow-color col-4">MODIFICA PROFILO</h2>

    </div>
    
    <div class="d-white-bg rounded-4 p-5 d-green-color">
        
        <form action="{{ route('doctors.update', $doctor->slug) }}" method="POST" enctype="multipart/form-data" id="editDataForm" class="row">
            @csrf
            @method('PUT')
            
            <!-- LEFT SIDE FORM -->
            <div class="col-6">

                <!-- NAME -->
                <div class="mb-4 row">

                    <label for="name" class="col-md-4 col-form-label text-md-right">NOME *</label>
            
                    <div class="col-md-8">
                        <input maxlength="255" required type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $doctor->name }}">
            
                        @error('name')
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
            
                <!-- SURNAME -->
                <div class="mb-4 row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">COGNOME *</label>
            
                    <div class="col-md-8">
                        <input type="text" maxlength="255" required class="form-control" id="surname" name="surname" value="{{ $doctor->surname }}">
            
                        @error('surname')
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
            
                <!-- ADDRESS -->
                <div class="mb-4 row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">INDIRIZZO *</label>
            
                    <div class="col-md-8">
            
                        <input type="text" maxlength="255" required class="form-control" id="address" name="address" value="{{ $doctor->address }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
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
                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">NUMERO TELEFONO *</label>
            
                    <div class="col-md-8">
            
                        <input type='text' maxlength="10" minlength="10" required class="form-control" id="phone_number" name="phone_number" value="{{ $doctor->phone_number }}">
            
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
            </div>
            
            <!-- RIGHT SIDE FORM -->
            <div class="col-6 border-start border-success">

                <!-- CV -->
                <div class="mb-4 row">

                    <label for="CV" class="col-md-4 col-form-label text-md-right">CV (PDF, DOC, DOCX)</label>
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
            
                        @if ($doctor->CV)
                            <div class="my-1">
            
                                <label for="old-cv" class="form-label mt-3">Il tuo vecchio curriculum:</label>
                                <div class="row">
            
                                    <div class="col-12">
                                        <embed src="{{ asset('/storage/' . $doctor->CV) }}" width="300" height="480" id="old-cv" />
                                    </div>
                                </div>
            
                            </div>
                        @else
                            <div class="text-center mt-2"> Non hai inserito un curriculum</div>
                        @endif
            
                    </div>
            
                </div>
            
                <!-- PROFILE PIC -->
                <div class="mb-4 row">
                    <label for="profile_pic" class="col-md-4 col-form-label text-md-right mt-4">IMMAGINE PROFILO</label>
            
                    <div class="col-md-8">
            
                        <input type="file" class="form-control mt-4" id="profile_pic" name="profile_pic">
            
                        @error('profile_pic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            
                        <ul id="profilePicFileError" class="mt-1 alert alert-danger p-2 d-none">
                            <li class='text-danger fw-bold ms-4'>La foto profilo deve essere in formato JPEG, JPG o PNG
                            </li>
                        </ul>
            
                        @if ($doctor->ProfilePic)
                            <div class="my-3">
                                <label for="old_profile_pic" class="form-label">La tua vecchia foto profilo:</label>
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{ asset('/storage/' . $doctor->ProfilePic) }}" class="img-fluid rounded-top" alt="{{ $doctor->name }}" id="old_profile_pic" width="150" height="70" />
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="text-center mt-2"> Non hai inserito una foto profilo</div>
                        @endif
                    </div>
            
                </div>
            
            </div>
                            
            <!-- BOTTOM FORM -->
            <div class="col-12 border-top border-success pt-4">

                <!-- SPECIALIZATIONS -->
                <div class="mb-4 row">
                    <label for="specializations" class="col-md-2 col-form-label text-md-right">SPECIALIZZAZIONE *</label>

                    <div class="col-md-10">

                        <select name="specializations[]" id="specializations" multiple class='form-select @error('specializations') is-invalid @enderror'>

                            @forelse ($specializations as $item)
                                @if ($errors->any())
                                    <option value="{{ $item->id }}"
                                        {{ in_array($item->id, old('specializations', [])) ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->id }}"
                                        {{ $doctor->specializations->contains($item->id) ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endif

                            @empty

                                <option value="">Nessuna Specializzazione</option>
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
                        <textarea id="performances" class="form-control @error('performances') is-invalid @enderror" name="performances">{{old('performances') ?? $doctor->performances}}</textarea>

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
                {{ __('MODIFICA') }}
            </button>
                        
        </form>
    </div>

    <h5 class="text-end s-yellow-color mt-4">* questi campi sono obbligatori</h5>
</div>
        

@endsection
