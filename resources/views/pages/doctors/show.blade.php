@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>questo è il tuo profilo (show)</h2>

        <a href="{{route('doctors.edit', $doctor->id)}}" class="btn btn-primary">EDIT</a>

        {{-- <table class="table table-striped mt-4">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">doctor</th>
                <th scope="col">Slug</th>
              </tr>
            </thead>
            <tbody>

                @foreach ( $doctors as $item )
                <tr>
                    <th>{{$item->address}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->phone_number}}</td>
                    <td>{{$item->user_id}}</td>
                    <td>{{$item->performances}}</td>
                    <td>{{$item->ProfilePic}}</td>
                    <td>{{$item->CV}}</td>

                </tr>
                @endforeach

            </tbody>
          </table>


    </div> --}}


@endsection
