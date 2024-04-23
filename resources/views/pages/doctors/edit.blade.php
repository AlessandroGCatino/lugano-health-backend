@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-2 fw-bold">Edit the project:</h1>
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $doctor->name }}">
            </div>
    
            <div class="mb-3">
                <label for="surname" class="form-label">Surname:</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $doctor->surname }}">
            </div>
    
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $doctor->address }}">
            </div>
    
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $doctor->phone_number }}">
            </div>

            <div class="mb-3">
                <label for="cv" class="form-label">CV (PDF, DOC, DOCX):</label>
                <input type="file" class="form-control" id="cv" name="cv">
            </div>
    
            <div class="mb-3">
                <label for="profile_pic" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic">
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
@endsection
