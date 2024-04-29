@extends('layouts.app')

@section('title', 'Modifica il tuo profilo')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <form action="{{ route('doctors.update', $doctor->slug) }}" method="POST" enctype="multipart/form-data" id="editDataForm">
                    @csrf
                    @method('PUT')


                    <div class="card mt-4">
                        <div class="card-header">

                            <h2 class="fw-bold">Edit your profile:</h2>

                        </div>

                        <div class="card-body">


                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name:</label>

                                <div class="col-md-8">
                                    <input maxlength="255" required type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" value="{{ $doctor->name }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-4 row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">Surname:</label>

                                <div class="col-md-8">
                                    <input type="text" maxlength="255" required class="form-control" id="surname"
                                        name="surname" value="{{ $doctor->surname }}">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                            </div>

                            <div class="mb-4 row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address:</label>

                                <div class="col-md-8">

                                    <input type="text" maxlength="255" required class="form-control" id="address"
                                        name="address" value="{{ $doctor->address }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="mb-4 row">
                                <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone
                                    Number:</label>

                                <div class="col-md-8">

                                    <input type='text' maxlength="10" minlength="10" required class="form-control"
                                        id="phone_number" name="phone_number" value="{{ $doctor->phone_number }}">

                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="mb-4 row">
                                <label for="specializations" class="col-md-4 col-form-label text-md-right">Select your
                                    specializations</label>

                                <div class="col-md-8">

                                    <select name="specializations[]" id="specializations" multiple
                                        class='form-select @error('specializations') is-invalid @enderror'>


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
                                <label for="performances" class="col-md-4 col-form-label text-md-right">
                                    <span>{{ __('Performance') }}</span>
                                </label>
                            
                                <div class="col-md-8">
                                    <textarea id="performances" class="form-control @error('performances') is-invalid @enderror" name="performances">{{old('performances') ?? $doctor->performances}}</textarea>
                            
                                    @error('performances')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="CV" class="col-md-4 col-form-label text-md-right">CV (PDF, DOC,
                                    DOCX):</label>

                                <div class="col-md-8">

                                    <input type="file" class="form-control" id="CV" name="CV">

                                    @error('CV')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @if ($doctor->CV)
                                        <div class="my-1">

                                            <label for="old-cv" class="form-label mt-3">Il tuo vecchio curriculum:</label>

                                            <div class="row">

                                                <div class="col-12">
                                                    <embed src="{{ asset('/storage/' . $doctor->CV) }}" width="300"
                                                        height="480" id="old-cv" />

                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        <div class="text-center mt-2"> Non hai inserito un curriculum</div>
                                    @endif

                                </div>

                            </div>

                            <div class="mb-4 row">
                                <label for="profile_pic" class="col-md-4 col-form-label text-md-right">Profile
                                    Picture:</label>

                                <div class="col-md-8">

                                    <input type="file" class="form-control" id="profile_pic" name="profile_pic">

                                    @error('profile_pic')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    @if ($doctor->ProfilePic)
                                        <div class="my-3">
                                            <label for="old_profile_pic" class="form-label">La tua vecchia foto
                                                profilo:</label>
                                            <div class="row">
                                                <div class="col-12">
                                                    <img src="{{ asset('/storage/' . $doctor->ProfilePic) }}"
                                                        class="img-fluid rounded-top" alt="{{ $doctor->name }}"
                                                        id="old_profile_pic" width="150" height="70" />
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="text-center mt-2"> Non hai inserito una foto profilo</div>
                                    @endif
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="mb-4 row mb-0 mt-4">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Edit') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>



    </div>






@endsection
