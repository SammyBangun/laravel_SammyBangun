<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospitals.index', compact('hospitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hospitals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string',
        ]);

        Hospital::create($request->all());
        return redirect()->route('hospitals.index')->with('success', 'Data Rumah Sakit berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hospital $hospital)
    {
        return view('hospitals.show', compact('hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hospital $hospital)
    {
        return view('hospitals.edit', compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'nullable|email',
            'telepon' => 'nullable|string',
        ]);

        $hospital->update($request->all());
        return redirect()->route('hospitals.index')->with('success', 'Data Rumah Sakit berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();
        return response()->json(['success' => true]);
    }
}
