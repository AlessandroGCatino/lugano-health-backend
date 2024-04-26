<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $messages = Message::where("doctor_id", session('doctor')->id)->orderBy("date_sent", "desc")->get();


        return view('pages.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $validated_data = $request->validated();

        $new_message = Message::create($validated_data);
        return redirect()->route('pages.messages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return view('pages.messages.show', compact('message'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        return view('pages.messages.edit', compact('message'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        $validated_data = $request->validated();

        $message->update($validated_data);
        return redirect()->route('pages.messages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('dashboard.messages.index');
    }
}
