@extends('siswa.layout')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-4 text-[#945034]">📂 Pengumpulan Tugas</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full bg-[#FFDDAB] rounded-lg shadow-md">
            <thead>
                <tr class="bg-[#945034] text-white">
                    <th class="px-4 py-3 text-left">Judul</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tugas as $item)
                    @php
                        $kumpul = $pengumpulan->where('tugas_id', $item->id)->first();
                    @endphp
                    <tr class="border-b hover:bg-[#fff3e0] transition">
                        <td class="px-4 py-3 font-semibold text-[#945034]">{{ $item->judul }}</td>
                        <td class="px-4 py-3">
                            @if($kumpul)
                                <span class="bg-[#5F8B4C] text-white px-3 py-1 rounded-lg shadow">
                                    ✔ Sudah dikumpulkan
                                </span>
                            @else
                                <span class="bg-[#FF9A9A] text-white px-3 py-1 rounded-lg shadow">
                                    ✖ Belum
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 space-x-2">
                            @if(!$kumpul)
                                {{-- Jika belum dikumpulkan, tombol untuk upload --}}
                                <a href="{{ route('siswa.pengumpulan.create', $item->id) }}" 
                                   class="bg-[#5F8B4C] text-white px-3 py-1 rounded-lg shadow hover:bg-green-700 transition">
                                    ⬆ Upload
                                </a>
                            @else
                                {{-- Jika sudah dikumpulkan, tombol lihat file --}}
                                <a href="{{ asset('storage/'.$kumpul->file) }}" target="_blank" 
                                   class="bg-[#5F8B4C] text-white px-3 py-1 rounded-lg shadow hover:bg-green-700 transition">
                                    📄 Lihat File
                                </a>
                                {{-- Tambahkan tombol edit & hapus --}}
                                <a href="{{ route('siswa.pengumpulan.edit', $kumpul->id) }}" 
                                   class="bg-yellow-500 text-white px-3 py-1 rounded-lg shadow hover:bg-yellow-600 transition">
                                    ✏ Edit
                                </a>
                                <form action="{{ route('siswa.pengumpulan.destroy', $kumpul->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded-lg shadow hover:bg-red-600 transition"
                                        onclick="return confirm('Yakin mau hapus pengumpulan ini?')">
                                        🗑 Hapus
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-600">
                            Tidak ada tugas yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
