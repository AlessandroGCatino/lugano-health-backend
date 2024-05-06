<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use App\Http\Requests\StoreStatisticRequest;
use App\Http\Requests\UpdateStatisticRequest;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = Statistic::all();

        return view('pages.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticRequest $request)
    {
        $validated_data = $request->validated();

        $new_statistic = Statistic::create($validated_data);
        return redirect()->route('pages.statistics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
        return view('pages.statistics.show', compact('statistic'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        return view('pages.statistics.edit', compact('statistic'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatisticRequest $request, Statistic $statistic)
    {
        $validated_data = $request->validated();

        $statistic->update($validated_data);
        return redirect()->route('pages.statistics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();
        return redirect()->route('dashboard.statistics.index');
    }
}
