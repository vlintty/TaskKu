<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">Daftar Tugas</h1>

    <!-- Tombol kembali & tambah -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('guru.dashboard') }}" class="btn btn-secondary">
            ← Kembali ke Dashboard
        </a>
        <a href="{{ route('tugas.create') }}" class="btn btn-success">
            + Tambah Tugas
        </a>
    </div>

    @if($tugas->count())
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mata Pelajaran</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tugas as $item)
                <tr>
                    <td>{{ $item->mata_pelajaran }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->deadline }}</td>
                    <td>
                        <a href="{{ route('tugas.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('tugas.destroy', $item->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-muted">Belum ada tugas.</p>
    @endif
</div>

</body>
</html>
