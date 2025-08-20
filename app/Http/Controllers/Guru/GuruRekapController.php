<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Exports\RekapNilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class GuruRekapController extends Controller
{
    /**
     * Tampilkan halaman rekap nilai
     */
    public function index()
    {
        $nilai = Nilai::with('siswa', 'tugas')->get();
        return view('guru.rekap.index', compact('nilai'));
    }

    /**
     * Export ke Excel
     */
    public function exportExcel()
    {
        return Excel::download(new RekapNilaiExport, 'rekap_nilai.xlsx');
    }
}
