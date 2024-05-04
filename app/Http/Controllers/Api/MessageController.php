<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Message;
use App\Mail\NewContact;

class MessageController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_lead = new Message();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('info@luganohealth.com')->send(new NewContact($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
