<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index()
    { 
        $tugas = Tugas::where('guru_id', Auth::id())->get();
        return view('tugas.index', compact('tugas'));
    }

    public function create()
    { 
        return view('tugas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'deadline'       => 'nullable|date',
            'mata_pelajaran' => 'required|string|max:100', // ✅ tambahan
        ]);

        $data['guru_id'] = Auth::id();
        Tugas::create($data);

        return redirect()->route('tugas.index')->with('success','Tugas berhasil dibuat');
    }

    public function edit(Tugas $tugas)
    { 
        return view('tugas.edit', compact('tugas'));
    }

    public function update(Request $request, Tugas $tugas)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:255',
            'deskripsi'      => 'nullable|string',
            'deadline'       => 'nullable|date',
            'mata_pelajaran' => 'required|string|max:100', // ✅ tambahan
        ]);

        $tugas->update($data);

        return redirect()->route('tugas.index')->with('success','Tugas diperbarui');
    }

    public function destroy(Tugas $tugas)
    {
        $tugas->delete();
        return redirect()->route('tugas.index')->with('success','Tugas dihapus');
    }
}
