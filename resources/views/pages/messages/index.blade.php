@extends('layouts.app')

@section('content')
    <h1 class="mt-2 fw-bold">The messages:</h1>

    <a href="{{ route('pages.messages.create') }}" class="btn btn-primary d-block ms-auto">write a new message</a>

    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">usernames</th>
                <th scope="col">message</th>
                <th scope="col">testi_messaggi</th>
                <th scope="col">emails</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($messages as $item)
                <tr>
                    <th>{{ $item->usernames }}</th>
                    <td><a href="{{ route('pages.messages.show') }}">{{ $item->testi_messaggi }}</a></td>
                    <th>{{ $item->emails }}</th>
                </tr>
            @endforeach

        </tbody>
    </table>
    </div>
@endsection
