<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Pemilihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepemilih') }}">
                <img src="{{ asset('assets/KPULogo.png') }}" class="bi me-1" width="40" height="42" role="img" aria-label="Bootstrap">
                Pemilu Legislatif
            </a>
            <form method="POST" action="{{ route('logoutpemilih') }}">
                @csrf
                <button type="submit" class="btn btn-link text-white"><h3><i class="bi bi-box-arrow-left"></h3></i></button>
            </form>
        </div>

    </nav>

    <!-- Welcome Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger text-center" role="alert">
                    <h4 class="alert-heading">Selamat Datang, {{ Auth::user()->nama }}!</h4>
                    <p>Gunakan hak pilih anda sebaik-baiknya. Selalu terapkan prinsip LUBER JURDIL.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="container mt-3">
        <div class="row">
            <!-- DPR Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DPR RI</h5>
                        <img src="../assets/KPULogo.png" class="bi card-img p-1" role="img" aria-label="Bootstrap">
                        <a href="/pemilihan/dpr" class="w-100 mb-3 btn btn-lg rounded-3 btn-warning">Surat Suara</a>
                    </div>
                </div>
            </div>
            <!-- DPD Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DPD RI</h5>
                        <img src="../assets/KPULogo.png" class="bi card-img p-1" role="img" aria-label="Bootstrap">
                        <a href="/pemilihan/dpd" class="w-100 mb-3 btn btn-lg rounded-3 btn-danger">Surat Suara</a>
                    </div>
                </div>
            </div>
            <!-- DPRD Provinsi Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DPRD Provinsi</h5>
                        <img src="../assets/KPULogo.png" class="bi card-img p-1" role="img" aria-label="Bootstrap">
                        <a href="/pemilihan/dprdprov" class="w-100 mb-3 btn btn-lg rounded-3 btn-primary">Surat Suara</a>
                    </div>
                </div>
            </div>
            <!-- DPRD Kabupaten/Kota Card -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">DPRD Kabupaten/Kota</h5>
                        <img src="../assets/KPULogo.png" class="bi card-img p-1" role="img" aria-label="Bootstrap">
                        <a href="/pemilihan/dprdkab" class="w-100 mb-3 btn btn-lg rounded-3 btn-success">Surat Suara</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
