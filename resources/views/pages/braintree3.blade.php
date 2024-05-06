@extends('layouts.app')


<head>
    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

@section('content')
    
<div class="py-12">
    
    @csrf
    
    <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
    <div style="display: flex;justify-content: center;align-items: center; color: black">
        <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
    </div>


    <form id="hiddenForm" action="{{ route('doctor.assignSponsorization3') }}" method="POST" style="display: none;">
        @csrf <!-- Aggiungi il token CSRF se necessario -->
        <input type="hidden" name="doctor_id" value="{{session('doctor')->id}}">
        <input type="hidden" name="sponsor_id" value="3">
    </form>

    <script>
        var button = document.querySelector('#submit-button');
        braintree.dropin.create({
            authorization: '{{$token}}',
            container: '#dropin-container'
        }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    (function($) {
                        $(function() {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: "{{route('token3')}}",
                                data: {nonce : payload.nonce},
                                success: function (data) {
                                    console.log('success',payload.nonce)
                                    document.getElementById('hiddenForm').submit();
                                },
                                error: function (data) {
                                    console.log('error',payload.nonce)
                                }
                            });
                        });
                    })(jQuery);
                });
            });
        });
        </script>
</div>
@endsection