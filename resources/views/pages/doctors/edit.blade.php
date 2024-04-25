@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2 fw-bold">Edit your profile:</h1>
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input maxlength="255" required type="text" class="form-control @error('name') is-invalid @enderror"
                    id="name" name="name" value="{{ $doctor->name }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label>
                <input type="text" maxlength="255" required class="form-control" id="surname" name="surname"
                    value="{{ $doctor->surname }}">

                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" maxlength="255" required class="form-control" id="address" name="address"
                    value="{{ $doctor->address }}">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type='text' maxlength="10" minlength="10" required class="form-control" id="phone_number"
                    name="phone_number" value="{{ $doctor->phone_number }}">

                @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="specializations" class="form-label">Select your specializations</label>

                <select name="specializations[]" id="specializations" multiple
                    class='form-select @error('specializations') is-invalid @enderror'>

                    <option value="">Select one or more</option>

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

            </div> --}}

            <div class="mb-3">
                <label for="CV" class="form-label">CV (PDF, DOC, DOCX):</label>
                <input type="file" class="form-control" id="CV" name="CV">

                @error('CV')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            @if ($doctor->CV)
                <embed src="{{ asset('/storage/' . $doctor->CV) }}" width="800px" height="1200px" />
            @endif

            <div class="mb-3">
                <label for="profile_pic" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic">

                @error('profile_pic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <img src="{{ asset('/storage/' . $doctor->ProfilePic) }}" class="img-fluid rounded-top"
                alt="{{ $doctor->name }}" />

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
@endsection
