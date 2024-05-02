<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\Sponsorization;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('specializations')->where('slug','cardiologia')->get();

        dd($doctors);

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

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();
        return view('pages.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();
        $specializations = Specialization::all();
        $sponsorizations = Sponsorization::all();



        return view('pages.doctors.edit', compact('doctor', 'specializations', 'sponsorizations'));
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $doctor = Doctor::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'regex:/^[0-9]+$/','max:10','min:10'],
            'CV' => ['nullable', 'file','mimes:pdf,doc,docx'],
            'ProfilePic' => ['nullable', 'image'],
            'specializations' => ['nullable', 'array'],
            'performances' => ['nullable', 'string'],
        ]);

        $update_data = $request->all();

        if($request->hasFile("CV")){
            if($doctor->CV){
                Storage::delete($doctor->CV);
            }
            $path = Storage::disk("public")->put("cv_images", $request->CV);
            $update_data["CV"] = $path;
        }

        if($request->hasFile("profile_pic")){
            if($doctor->ProfilePic){
                Storage::delete($doctor->ProfilePic);
            }
            $path = Storage::disk("public")->put("profile_images", $request->profile_pic);
            $update_data["ProfilePic"] = $path;
        }

        if($request->has('specializations')){
            $doctor->specializations()->sync($request->specializations);
        } else {
            $doctor->specializations()->detach();
        }

        $doctor->update($update_data);

        $logDoc = Doctor::where("id" , $doctor->id)->first();
        session(['doctor' => $logDoc]);

        return redirect()->route('dashboard', ['doctor' => $doctor->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {


    }
}
