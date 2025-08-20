<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tugas Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">Buat Tugas Baru</h1>

    <form action="{{ route('tugas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
    <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
    <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" required>
</div>

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" id="deadline" name="deadline" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
