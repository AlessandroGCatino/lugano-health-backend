<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BraintreeController3 extends Controller
{
    public function token(Request $request){

        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);
    
        if($request->input('nonce') != null){
            $nonceFromTheClient = $request->input('nonce');
    
            $gateway->transaction()->sale([
                'amount' => '30.00',
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);

            return redirect()->route('dashboard');
        } else {
            
            $clientToken = $gateway->clientToken()->generate();
            return view ('pages.braintree3',['token' => $clientToken]);
        }
    }
}
