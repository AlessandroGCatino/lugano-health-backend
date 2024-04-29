@extends('layouts.app')

@section('title', 'Your Profile')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header" style="background-color: #ffe600;">
                        <h2 class="mb-0">Dr. {{ $doctor->name }} {{ $doctor->surname }}</h2>
                    </div>

                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Address:</strong> {{ $doctor->address }}
                        </div>

                        <div class="mb-3">
                            <strong>Phone Number:</strong> {{ $doctor->phone_number }}
                        </div>

                        <div class="mb-3">
                            <strong>Specializations:</strong>
                            @foreach($doctor->specializations as $specialization)
                                <span class="badge bg-secondary">{{ $specialization->name }}</span>
                            @endforeach
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('doctors.edit', $doctor->slug) }}" class="btn btn-warning me-md-2">Edit</a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-account">
                                {{__('Delete Account')}}
                            </button>
                        
                            <div class="modal fade" id="delete-account" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete-account" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete-account">Delete Account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-lg font-medium text-gray-900">
                                                {{ __("Vuoi eliminare l'account in maniera definitiva?") }}
                                            </h2>
                                            <p class="mt-1 text-sm text-gray-600">
                                                {{ __('Cancellerà definitivamente il tuo account, insieme a tutte le sue risorse e dati. Per favore, inserisci la tua password per confermare che desideri eliminare definitivamente il tuo account.') }}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        
                                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                                @csrf
                                                @method('delete')
                        
                        
                                                <div class="input-group">
                        
                                                    <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}" />
                        
                                                    @error('password')
                                                    <span class="invalid-feedback mt-2" role="alert">
                                                        <strong>{{ $errors->userDeletion->get('password')}}</strong>
                                                    </span>
                                                    @enderror
                        
                        
                        
                                                    <button type="submit" class="btn btn-danger">
                                                        {{ __('Delete Account') }}
                                                    </button>
                                                    <!--  -->
                                                </div>
                                            </form>
                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
