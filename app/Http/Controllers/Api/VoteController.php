<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Vote;
use App\Models\Doctor;
use App\Mail\NewContact;

class VoteController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make($data, [
            'doctor_id' => 'required|exists:doctors,id',
            'vote_id' => 'required|exists:votes,id',
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $doctor = Doctor::findOrFail($data['doctor_id']);

        $doctor->votes()->attach($data['vote_id']);

        return response()->json(['success' => true]);

    }
}
