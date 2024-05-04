<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Review;
use App\Mail\NewContact;

class ReviewController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'user_name' => 'required',
            'comment' => 'required',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $new_review = new Review();
        $new_review->fill($data);
        $new_review->save();

        Mail::to('info@luganohealth.com')->send(new NewContact($new_review));

        return response()->json([
            'success' => true
        ]);
        
    }
}
