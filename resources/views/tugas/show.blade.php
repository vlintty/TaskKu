<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4">Detail Tugas</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $tugas->judul }}</h3>
            <p>{{ $tugas->deskripsi }}</p>
            <p><strong>Deadline:</strong> {{ $tugas->deadline }}</p>
        </div>
    </div>

    <a href="{{ route('tugas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>

</body>
</html>
