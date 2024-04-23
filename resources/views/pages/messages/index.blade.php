@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-3 fw-bold">Messages Received</h1>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">From</th>
                                        <th scope="col">Dates</th>
                                        <th scope="col">Emails</th>
                                        <th scope="col">Messages</th>
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
