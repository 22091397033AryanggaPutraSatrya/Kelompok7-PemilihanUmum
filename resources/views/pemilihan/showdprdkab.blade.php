<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $form_dprdkab->nama }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
        <div class="container-fluid mb-2">
            <a href="{{ route('suratsuaradprdkab') }}"><h1 class="text-white"><i class="bi bi-arrow-left"></i></h1></a>
            <div class="mx-auto text-center text-white">
                <h1 class="mb-0">Calon DPRD Kabupaten/Kota</h1>
                <h1 class="mb-0">{{ $form_dprdkab->nama }}</h1>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if($form_dprdkab->foto)
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $form_dprdkab->foto) }}" alt="Foto {{ $form_dprdkab->nama }}" class="img-fluid" width="500">
                        </div>
                    @endif
                    <div class="@if($form_dprdkab->foto) col-md-8 @else col-md-12 @endif">
                        <p><strong>Nama:</strong> {{ $form_dprdkab->nama }}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $form_dprdkab->jenis_kelamin }}</p>
                        <p style="text-align: justify;"><strong>Visi Misi:</strong> {{ $form_dprdkab->visi_misi }}</p>
                        <p><strong>Pendidikan:</strong> {{ $form_dprdkab->pendidikan }}</p>
                        <p><strong>Pengalaman Kerja:</strong> {{ $form_dprdkab->pengalaman_kerja }}</p>
                        <p><strong>Organisasi:</strong> {{ $form_dprdkab->organisasi }}</p>
                        <p><strong>Prestasi:</strong> {{ $form_dprdkab->prestasi }}</p>
                    </div>
                </div>
            </div>
            @if ($userVote)
            <button class="btn btn-secondary m-2" disabled>Anda telah menggunakan Hak Pilih Anda.</button>
            @else
                <form action="{{ route('dprdkab-submissions.vote', $form_dprdkab->id) }}" method="POST" class="d-grid gap-2">
                    @csrf
                    <button name="vote" value="1"class="btn btn-success m-2">Pilih</button>
                </form>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
