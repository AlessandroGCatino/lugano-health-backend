@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3 fw-bold">Messaggi Ricevuti</h1>

        <div class="row mt-4 mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Da</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Messaggio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                        <tr>
                                            <td class="text-capitalize">{{ $message->name }}</td>
                                            <td class="text-capitalize">{{ \Carbon\Carbon::parse($message->created_at)->locale('it')->isoFormat('D MMMM YYYY') }}</td>
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
