<?php

namespace App\Http\Controllers;

use App\Models\Sponsorization;
use App\Http\Requests\StoreSponsorizationRequest;
use App\Http\Requests\UpdateSponsorizationRequest;
use Illuminate\Support\Facades\DB;

class SponsorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorizations = Sponsorization::all();

        $sponsorList = DB::table('doctor_sponsorization')
        ->where('doctor_id', session("doctor")->id)
        ->orderBy('deadline', 'desc') // Ordina in base alla deadline in ordine discendente
        ->first();
        
        return view('pages.sponsorizations.index', compact('sponsorizations', "sponsorList"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.sponsorizations.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSponsorizationRequest $request)
    {
        $validated_data = $request->validated();

        $new_sponsorization = Sponsorization::create($validated_data);
        return redirect()->route('pages.sponsorizations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsorization $sponsorization)
    {
        return view('pages.sponsorizations.show', compact('sponsorization'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsorization $sponsorization)
    {
        return view('pages.sponsorizations.edit', compact('sponsorization'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSponsorizationRequest $request, Sponsorization $sponsorization)
    {
        $validated_data = $request->validated();

        $sponsorization->update($validated_data);
        return redirect()->route('pages.sponsorizations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsorization $sponsorization)
    {
        $sponsorization->delete();
        return redirect()->route('dashboard.sponsorizations.index');
    }
}
