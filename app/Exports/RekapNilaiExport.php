<?php

namespace App\Exports;

use App\Models\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapNilaiExport implements FromCollection, WithHeadings
{
    /**
     * Ambil data untuk diexport
     */
    public function collection()
    {
        return Nilai::with('siswa', 'tugas')->get()->map(function ($n) {
            return [
                'Nama Siswa' => $n->siswa->name,
                'Judul Tugas' => $n->tugas->judul,
                'Nilai' => $n->nilai,
            ];
        });
    }

    /**
     * Judul kolom di excel
     */
    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Judul Tugas',
            'Nilai',
        ];
    }
}
