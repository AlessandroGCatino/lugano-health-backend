<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('specializations','votes')->get();
        $specializations = Specialization::all();
        $votes = Vote::all();

        return response()->json([
            'success' => true,
            'doctors' => $doctors,
            'specializations' => $specializations,
            'votes' => $votes,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $doctor = Doctor::where('slug', $slug)->with('specializations', 'votes', 'reviews')->get();

        if ($doctor) {
            return response()->json([
                'success' => true,
                'doctor' => $doctor
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'The doctor does not exist'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getDoctorsBySpecializationSlug($slug)
    {
        $specialization = Specialization::where('slug', $slug)->first();

        $doctors = Doctor::whereHas('specializations', function ($query) use ($specialization) {
            $query->where('slug', $specialization->slug);
        })
        ->leftJoin('doctor_sponsorization', function ($join) {
            $join->on('doctors.id', '=', 'doctor_sponsorization.doctor_id')
                ->whereNull('doctor_sponsorization.deadline');
        })
        ->select('doctors.*', 'doctor_sponsorization.deadline')
        ->whereNull('doctor_sponsorization.id')
        ->orWhereIn('doctor_sponsorization.id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('doctor_sponsorization')
                ->groupBy('doctor_id');
        })
        ->orderBy('doctor_sponsorization.deadline', 'desc')
        ->with('specializations','votes', "reviews")
        ->get();


        $votes = DB::table('doctor_vote')
        ->select('doctor_id', DB::raw('AVG(vote_id) as voteRating'))
        ->groupBy('doctor_id') // Aggiungi un raggruppamento per ottenere la media per ogni dottore
        ->orderBy('doctor_id')
        ->get();

        $reviews = DB::table('reviews')
        ->select('doctor_id', DB::raw('COUNT(doctor_id) as nRevs'))
        ->groupBy('doctor_id') // Aggiungi un raggruppamento per ottenere la somma per ogni dottore
        ->orderBy('doctor_id')
        ->get();

        $reviewsArray = $reviews->mapWithKeys(function ($item) {
            return [$item->doctor_id => $item->nRevs];
        })->all();


        $votesArray = $votes->mapWithKeys(function ($item) {
            return [$item->doctor_id => $item->voteRating];
        })->all();
        
        // Unisci i risultati dei dottori con la media dei voti
        $doctorsWithVotes = $doctors->map(function ($doctor) use ($votesArray) {
            $doctor->voteRating = $votesArray[$doctor->id] ?? null;
            return $doctor;
        });

        $doctorsWithReviews = $doctorsWithVotes->map(function ($doctor) use ($reviewsArray) {
            $doctor->nRevs = $reviewsArray[$doctor->id] ?? null;
            return $doctor;
        });


        return response()->json([
            'success' => true,
            'doctors' => $doctorsWithReviews,
            // 'avgVotes' => $votes
        ]);
    }

    public function getSponsorizedDoctors()
    {

        $doctors = Doctor::leftJoin('doctor_sponsorization', function ($join) {
            $join->on('doctors.id', '=', 'doctor_sponsorization.doctor_id')
                ->whereNotNull('doctor_sponsorization.deadline');
        })
        ->select('doctors.*', 'doctor_sponsorization.deadline')
        ->whereNotNull('doctor_sponsorization.deadline') // Aggiunto filtro per la colonna deadline popolata
        ->whereNull('doctor_sponsorization.id')
        ->orWhereIn('doctor_sponsorization.id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('doctor_sponsorization')
                ->groupBy('doctor_id');
        })
        ->orderBy('doctor_sponsorization.deadline', 'desc')
        ->with('specializations', 'votes', 'reviews')
        ->get();


        $votes = DB::table('doctor_vote')
        ->select('doctor_id', DB::raw('AVG(vote_id) as voteRating'))
        ->groupBy('doctor_id') // Aggiungi un raggruppamento per ottenere la media per ogni dottore
        ->orderBy('doctor_id')
        ->get();

        $reviews = DB::table('reviews')
        ->select('doctor_id', DB::raw('COUNT(doctor_id) as nRevs'))
        ->groupBy('doctor_id') // Aggiungi un raggruppamento per ottenere la somma per ogni dottore
        ->orderBy('doctor_id')
        ->get();

        $reviewsArray = $reviews->mapWithKeys(function ($item) {
            return [$item->doctor_id => $item->nRevs];
        })->all();


        $votesArray = $votes->mapWithKeys(function ($item) {
            return [$item->doctor_id => $item->voteRating];
        })->all();
        
        // Unisci i risultati dei dottori con la media dei voti
        $doctorsWithVotes = $doctors->map(function ($doctor) use ($votesArray) {
            $doctor->voteRating = $votesArray[$doctor->id] ?? null;
            return $doctor;
        });

        $doctorsWithReviews = $doctorsWithVotes->map(function ($doctor) use ($reviewsArray) {
            $doctor->nRevs = $reviewsArray[$doctor->id] ?? null;
            return $doctor;
        });


        return response()->json([
            'success' => true,
            'doctors' => $doctorsWithReviews,
            // 'avgVotes' => $votes
        ]);
    }
}
