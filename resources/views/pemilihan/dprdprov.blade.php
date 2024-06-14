<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Suara DPRD Provinsi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary d-flex align-items-center justify-content-center">
        <div class="card bg-primary border-0">
            <div class="row">
                <div class="col-md-2 d-flex align-items-center justify-content-center">
                    <a href="/pemilihan/home">
                        <img src="../assets/KPULogo.png" width="100" height="102" class="img-fluid rounded-start" alt="KPU Logo">
                    </a>
                </div>
                <div class="col-md-10 d-flex align-items-center">
                    <div class="card-body text-center text-white">
                        <h1 class="card-title mb-0">Surat Suara</h1>
                        <h1 class="card-title mb-0">Dewan Perwakilan Rakyat Daerah Provinsi</h1>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @foreach($dprdprov_submissions as $partai => $submissions)
            <h3 class="mt-4">{{ $partai }}</h3>
            <table class="table table-hover mb-5">
                <thead>
                    <tr>
                        <th class="col-1">No</th>
                        <th>Nama</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($submissions as $dprdprov)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dprdprov->nama }}</td>
                            <td class="text-end">
                                <a href="{{ route('detaildprdprov', $dprdprov->id) }}" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
