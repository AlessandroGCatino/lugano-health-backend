@extends('layouts.app')

@section('content')
    <div class="px-5 pb-5 pt-1 d-green-bg">

        <div class="row align-items-center mb-3 mt-4">

            <hr class="my-0 col-8">
            <h2 class="fw-bold text-end s-yellow-color col-4">LE TUE RECENSIONI</h2>

        </div>

        <div class="row mt-4 mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body d-white-bg">
                        <div class="table-responsive">
                            <table class="table rounded-3 d-white-bg table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Da</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Recensione</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $item)
                                        <tr>
                                            <td class="text-capitalize">{{ $item->user_name }}</td>
                                            <td class="text-capitalize">
                                                {{ \Carbon\Carbon::parse($item->created_at)->locale('it')->isoFormat('D MMMM YYYY') }}
                                            </td>
                                            <td>{{ $item->user_mail }}</td>
                                            <td class="review-text">{{ $item->comment }}</td>
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
    /* Gestisci il wrapping del testo lungo nelle recensioni */
    .review-text {
        max-width: 300px;
        /* Modifica la larghezza massima in base alle tue esigenze */
        overflow-wrap: break-word;
    }

    /* Stili base */
    .px-5.pb-5.pt-1.d-green-bg {
        padding: 1rem;
    }

    /* Stili per schermi extra piccoli (come iPhone) */
    @media (max-width: 480px) {
        .px-5.pb-5.pt-1.d-green-bg {
            padding: 0.5rem;
        }

        .row.align-items-center.mb-3.mt-4 {
            flex-direction: column;
        }

        .col-md-12 {
            width: 100%;
        }
    }

    /* Stili per tablet (iPad) */
    @media (min-width: 481px) and (max-width: 767px) {
        .px-5.pb-5.pt-1.d-green-bg {
            padding: 1rem;
        }

        .row.align-items-center.mb-3.mt-4 {
            flex-direction: column;
        }

        .col-md-12 {
            width: 100%;
        }
    }

    /* Stili per schermi medi e superiori */
    @media (min-width: 768px) {
        .px-5.pb-5.pt-1.d-green-bg {
            padding: 1rem;
        }

        .row.align-items-center.mb-3.mt-4 {
            flex-direction: row;
        }

        .col-md-12 {
            width: 100%;
        }
    }
</style>
