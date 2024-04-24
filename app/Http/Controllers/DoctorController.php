<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('pages.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated_data = $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'surname' => ['required', 'string', 'max:255'],
        //     'address' => ['required', 'string', 'max:255'],
        //     'phone_number' => ['required', 'string', 'max:255'],
        //     'CV' => ['nullable', 'file','mimes:pdf,doc,docx'],
        //     'ProfilePic' => ['nullable', 'image'],
        //     'performances' => ['required', 'string'],
        // ]);

        // $new_doctor = Doctor::create($validated_data);
        // return redirect()->route('pages.doctors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        // $doctors = Doctor::find($id);
        return view('pages.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        // $doctors = Doctor::all();
        return view('pages.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        // $doctors = Doctor::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'regex:/^[0-9]+$/','max:10','min:10'],
            'CV' => ['nullable', 'file','mimes:pdf,doc,docx'],
            'ProfilePic' => ['nullable', 'image'],
        ]);

        $update_data = $request->all();

        $doctor->update($update_data);

        return redirect()->route('dashboard', ['doctor' => $doctor->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
