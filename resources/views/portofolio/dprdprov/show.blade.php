
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>DPRD Provinsi | Biodata Caleg</title>

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

    <main class="container" style="margin-top: 50px;">
        <h1 style="margin-bottom: 20px">Data Caleg DPRD Provinsi</h1>
        {{-- <a href="{{ route('edit', $form_dprdprov->id) }}" class="btn btn-primary">Edit Portofolio</a> --}}
        <div class="row">
            <div class="col-md-6">
               {{-- <img src="assets/KPULogo.png" style="width: 250px" alt=""> --}}
               {{-- <img class="bd-placeholder-img rounded-circle" width="270" height="270" style="margin-top: 50px; margin-left: 40px;" src="https://www.bing.com/th?id=OIP.YGZ8maalsglQKp7J9CVXFgHaHa&w=172&h=185&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" alt="Placeholder"> --}}
               
               @if($form_dprdprov->foto)
                   <img src="{{ Storage::url($form_dprdprov->foto) }}" alt="kenapasih" class="bd-placeholder-img rounded-circle" width="270" height="270" style="margin-top: 50px; margin-left: 40px;" >
               @else
                   <p>No photo uploaded</p>
               @endif
              </div>
            
            <div class="col-md-6" style="margin-left: -130px">
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama Lengkap</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->nama }}" aria-label="Disabled input example" disabled readonly>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Jenis Kelamin</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->jenis_kelamin }}" aria-label="Disabled input example" disabled readonly>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kewarganegaraan</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->kewarganegaraan }}" aria-label="Disabled input example" disabled readonly>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tempat Tanggal Lahir</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->tempat_tanggal_lahir }}" aria-label="Disabled input example" disabled readonly>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Partai</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->partai }}" aria-label="Disabled input example" disabled readonly>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kota</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->kota }}" aria-label="Disabled input example" disabled readonly>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Provinsi</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->provinsi }}" aria-label="Disabled input example" disabled readonly>
              </div>
              <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kode Pos</label>
                <input class="form-control" type="text" value="{{ $form_dprdprov->kode_pos }}" aria-label="Disabled input example" disabled readonly>
              </div>
            </div>
            <div class="col-md-6" style="margin-top: 50px">
              <p  style="margin-top: 30px"><strong>Visi & Misi:</strong></p>
              <p>{{ $form_dprdprov->visi_misi }}</p>
              <p  style="margin-top: 50px"><strong>Pendidikan:</strong></p>
              <p>{{ $form_dprdprov->pendidikan }}</p>
              <p  style="margin-top: 50px"><strong>Pengalaman Kerja:</strong></p>
              <p>{{ $form_dprdprov->pengalaman_kerja }}</p>
              <p  style="margin-top: 50px"><strong>Organisasi:</strong></p>
              <p>{{ $form_dprdprov->organisasi }}</p>
              <p  style="margin-top: 50px"><strong>Prestasi:</strong></p>
              <p>{{ $form_dprdprov->prestasi }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" style="margin-top: 20px;">
              <!-- Tambahkan tombol Edit -->
              <a href="{{ route('portofolio/dprdprov/edit', $form_dprdprov->id) }}" class="btn btn-primary">Edit</a> 
              <!-- Tambahkan tombol Delete -->
              <form action="{{ route('destroy', $form_dprdprov->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form> 
          </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
