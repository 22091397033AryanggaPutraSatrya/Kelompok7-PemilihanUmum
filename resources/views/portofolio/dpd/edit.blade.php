<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DPR | Edit Form Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="/assets/KPULogo.png" alt="" style="width: 35px; margin-right: 15px; margin-left: 50px;">
            <a class="navbar-brand" href="#" style="font-weight: 500; margin-right: 40px; color: red;">Komisi Pemilihan Umum</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('portofolio/dashboard') }}" style="margin-right: 20px;">Caleg</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Portofolio
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('portofolio/dpr/create') }}">DPR</a></li>
                        <li><a class="dropdown-item" href="{{ route('portofolio/dpd/create') }}">DPD</a></li>
                        <li><a class="dropdown-item" href="{{ route('portofolio/dprdprov/create') }}">DPRD PROVINSI</a></li>
                        <li><a class="dropdown-item" href="{{ route('portofolio/dprdkab/create') }}">DPRD KABUPATEN</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lihat Portofolio
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('portofolio/dpr/show', 1) }}">DPR</a></li>
                        <li><a class="dropdown-item" href="{{ route('portofolio/dpd/show', 1) }}">DPD</a></li>
                        <li><a class="dropdown-item" href="{{ route('portofolio/dprdprov/show', 1) }}">DPRD PROVINSI</a></li>
                        <li><a class="dropdown-item" href="{{ route('portofolio/dprdkab/show', 1) }}">DPRD KABUPATEN</a></li>
                      </ul>
                    </li>
                  
  
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container mt-5">
        <h1>Edit Data Caleg</h1>
        <form action="{{ route('update', $form_dpd->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" value="{{ $form_dpd->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" value="{{ $form_dpd->jenis_kelamin }}" required>
            </div>
            <div class="mb-3">
                <label for="tempat_tanggal_lahir" class="form-label">Tempat Tanggal Lahir</label>
                <input type="text" name="tempat_tanggal_lahir" class="form-control" value="{{ $form_dpd->tempat_tanggal_lahir }}" required>
            </div>
            <div class="mb-3">
                <label for="partai" class="form-label">Partai</label>
                <input type="text" name="partai" class="form-control" value="{{ $form_dpd->partai }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $form_dpd->alamat }}" required>
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" name="kota" class="form-control" value="{{ $form_dpd->kota }}" required>
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" value="{{ $form_dpd->provinsi }}" required>
            </div>
            <div class="mb-3">
                <label for="kode_pos" class="form-label">Kode Pos</label>
                <input type="text" name="kode_pos" class="form-control" value="{{ $form_dpd->kode_pos }}" required>
            </div>
            <div class="mb-3">
                <label for="visi_misi" class="form-label">Visi Misi</label>
                <textarea name="visi_misi" class="form-control" required>{{ $form_dpd->visi_misi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan</label>
                <textarea name="pendidikan" class="form-control" required>{{ $form_dpd->pendidikan }}</textarea>
            </div>
            <div class="mb-3">
                <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja</label>
                <textarea name="pengalaman_kerja" class="form-control" required>{{ $form_dpd->pengalaman_kerja }}</textarea>
            </div>
            <div class="mb-3">
                <label for="organisasi" class="form-label">Organisasi</label>
                <textarea name="organisasi" class="form-control" required>{{ $form_dpd->organisasi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="prestasi" class="form-label">Prestasi</label>
                <textarea name="prestasi" class="form-control" required>{{ $form_dpd->prestasi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
