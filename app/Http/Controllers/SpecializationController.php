<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Http\Requests\StoreSpecializationRequest;
use App\Http\Requests\UpdateSpecializationRequest;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = Specialization::all();

        return view('pages.specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.specializations.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecializationRequest $request)
    {
        $validated_data = $request->validated();

        $new_specialization = Specialization::create($validated_data);
        return redirect()->route('pages.specializations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization)
    {
        return view('pages.specializations.show', compact('specialization'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialization $specialization)
    {
        return view('pages.specializations.edit', compact('specialization'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecializationRequest $request, Specialization $specialization)
    {
        $validated_data = $request->validated();

        $specialization->update($validated_data);
        return redirect()->route('pages.specializations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return redirect()->route('dashboard.specializations.index');
    }
}
