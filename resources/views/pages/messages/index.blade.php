@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3 fw-bold">Messaggi Ricevuti</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Da</th>
                                        <th scope="col">In data</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Messaggio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td>{{ $message->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($message->created_at)->format('j F Y') }}</td>
                                            <td>{{ $message->email }}</td>
                                            <td class="messages">{{ $message->message }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .messages{
        max-width: 300px;
        overflow-wrap: break-word;
    }
</style>
