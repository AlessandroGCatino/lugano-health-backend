<?php

namespace App\Http\Controllers;


session_start();
;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Doctor;
use App\Models\Review;
use Illuminate\Support\Number;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::where("doctor_id", session('doctor')->id)->orderBy("date_sent", "desc")->get();

        return view('pages.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.reviews.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        $validated_data = $request->validated();

        $new_review = Review::create($validated_data);
        return redirect()->route('pages.reviews.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('pages.reviews.show', compact('review'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        return view('pages.reviews.edit', compact('review'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $validated_data = $request->validated();

        $review->update($validated_data);
        return redirect()->route('pages.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('dashboard.reviews.index');
    }
}
