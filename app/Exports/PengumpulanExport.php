<?php

namespace App\Exports;

use App\Models\Pengumpulan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengumpulanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pengumpulan::with('tugas','siswa')->get()->map(function($p){
            return [
                'Tugas' => $p->tugas->judul,
                'Siswa' => $p->siswa->name,
                'Nilai' => $p->nilai,
                'File' => $p->file,
                'Tanggal' => $p->created_at,
            ];
        });
    }

    public function headings(): array
    {
        return ['Tugas','Siswa','Nilai','File','Tanggal'];
    }
}
