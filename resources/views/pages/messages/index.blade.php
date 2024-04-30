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
                                    @foreach ($messages->sortByDesc('date_sent') as $message)
                                        <tr>
                                            <td>{{ $message->user_name }}</td>
                                            <td>{{ $message->date_sent }}</td>
                                            <td>{{ $message->user_mail }}</td>
                                            <td>{{ $message->message }}</td>
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
