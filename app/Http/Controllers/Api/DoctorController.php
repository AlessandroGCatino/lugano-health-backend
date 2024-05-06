<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\Vote;
use Illuminate\Http\Request;

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
        $doctor = Doctor::where('slug', $slug)->with('specializations')->get();
        $doctor = Doctor::where('slug', $slug)->with('specializations')->get();

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
            $query->where('id', $specialization->id);
        })->with('specializations , votes')->get();

        return response()->json([
            'success' => true,
            'doctors' => $doctors
        ]);
    }
}
