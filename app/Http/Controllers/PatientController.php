<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Hospital;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::with('hospital')->get();
        $hospitals = Hospital::all();
        return view('patients.index', compact('patients', 'hospitals'));
    }

    public function create()
    {
        $hospitals = Hospital::all();
        return view('patients.create', compact('hospitals'));
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_telpon' => 'required|string',
            'id_rumah_sakit' => 'required|exists:hospitals,id',
        ]);

        Patient::create($request->all());
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil disimpan.');
    }

    public function edit(Patient $patient)
    {
        $hospitals = Hospital::all();
        return view('patients.edit', compact('patient', 'hospitals'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'no_telpon' => 'nullable|string',
            'id_rumah_sakit' => 'required|exists:hospitals,id',
        ]);

        $patient->update($request->all());
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil diupdate.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->json(['success' => true]);
    }

    public function filterByHospital($id)
    {
        $patients = Patient::with('hospital')
            ->when($id != 'all', function ($query) use ($id) {
                $query->where('id_rumah_sakit', $id);
            })
            ->get();

        return response()->json($patients);
    }
}
