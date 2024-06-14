<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepemilih') }}">
                <img src="{{ asset('assets/KPULogo.png') }}" class="bi me-2" width="40" height="42" role="img" aria-label="Bootstrap">
                Pemilu Legislatif
            </a>
            <form method="POST" action="{{ route('logoutpemilih') }}">
                @csrf
                <button type="submit" class="btn btn-danger w-100 mb-3">Keluar</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">Profil</h3>
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" value="{{ Auth::guard('pemilih')->user()->nama }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input class="form-control" id="alamat" value="{{ Auth::guard('pemilih')->user()->alamat }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" value="{{ Auth::guard('pemilih')->user()->tempat_lahir }}, {{ Auth::guard('pemilih')->user()->tanggal_lahir }}" readonly>
                        </div>

                        @if (Auth::guard('pemilih')->user()->ktp_image)
                            <div class="alert alert-success">
                                KTP anda telah terverifikasi.
                            </div>
                            <div class="mt-3">
                                <img src="{{ asset('storage/ktp/' . Auth::guard('pemilih')->user()->ktp_image) }}" alt="KTP Image" class="img-fluid" width="500">
                            </div>
                        @else
                            <form method="POST" action="{{ route('uploadktp') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="ktp" class="form-label">Upload KTP</label>
                                    <input type="file" class="form-control" id="ktp" name="ktp" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Unggah KTP</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
