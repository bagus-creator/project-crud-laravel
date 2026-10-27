<?php

namespace App\Http\Controllers;

use App\Models\Peserta;

use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = Peserta::all();
        return view('Peserta.peserta', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validasi Input
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:pesertas,email',
            'no_hp' => 'required|string|max:15',
        ]);

        //Simpan Data
        Peserta::create($validated);
        return redirect()->route('peserta.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi data
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:pesertas,email,' . $id,
            'no_hp' => 'required|string|max:15',
        ]);

        Peserta::where('id', $id)->update($validated);

        //Simpan Data

        return redirect()->route('peserta.index')->with('success', 'Data berhasil diubah');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Peserta::where('id', $id)->delete();
        return redirect()->route('peserta.index')->with('success', 'Data berhasil dihapus');
    }
}
