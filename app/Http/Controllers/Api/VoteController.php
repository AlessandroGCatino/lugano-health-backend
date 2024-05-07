<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request){

        $data = $request->all();


        $doctor = Doctor::find($data['doctor_id']);

        if (!$doctor) {
            return response()->json([
                'success' => false,
                'message' => 'Dottore non trovato.'
            ], 404);
        }

        $vote = Vote::find($data['vote_id']);
        
        if (!$vote) {
            return response()->json([
                'success' => false,
                'message' => 'Voto non trovato.'
            ], 404);
        }

        // Aggiungi i dati alla tabella pivot doctor_vote
        $doctor->votes()->attach($vote);
            
        return response()->json([
            'success' => true
        ]);
    }
}
