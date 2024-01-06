<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,600&family=Lato:wght@300;400;700&family=Manrope:wght@400;700;800&family=Martian+Mono:wght@800&family=Open+Sans:wght@300&family=Prompt&family=Public+Sans:wght@200&family=Righteous&family=Roboto:wght@500&family=Rubik:wght@600&family=Teko:wght@300&family=Vina+Sans&display=swap"
      rel="stylesheet"
    />
    <style>
      .hero {
        margin-top: 160px;
        margin-bottom: 160px;
      }
      @media (max-width: 768px) {
        .logo-title {
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <nav
      class="navbar fixed-top navbar-expand-lg bg-body-tertiary"
      style="font-family: 'Roboto', sans-serif"
    >
      <div class="container-fluid m-2">
        <a class="navbar-brand" href="#">
          <img
            src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg"
            alt="Logo"
            width="30"
            height="24"
            class="d-inline-block align-text-top"
          />
          <small class="logo-title"
            ><strong>DINAS KOPERASI & UMKM KAB. TTU</strong></small
          >
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="beranda.html"
                >Beranda</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.html">Produk UMKM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="maps.html">Maps</a>
            </li>
          </ul>
          <a href="registrasi.html" class="btn btn-outline-primary me-2"
            >Registrasi</a
          >
          <a href="login.html" class="btn btn-outline-primary mx-2">Login</a>
        </div>
      </div>
    </nav>
    <hr />
    <div class="container hero">
      <div class="row my-5 d-flex justify-content-center">
        <div class="col-lg-10">
          <div class="container">
            <div class="card">
              <div class="card-header"><h3>Registrasi</h3></div>
              <div class="card-body">
                <form>
                  <div class="mb-3">
                    <label for="nama_lengkap" class="form-label"
                      >Nama Lengkap <small><i>(Sesuai KTP)</i></small></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="nama_lengkap"
                      name="nama_lengkap"
                      placeholder="Masukkan Nama Lengkap"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="alamat_email" class="form-label"
                      >Alamat Email</label
                    >
                    <input
                      type="email"
                      class="form-control"
                      id="alamat_email"
                      name="alamat_email"
                      placeholder="Masukkan Email"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="password"
                      name="password"
                      placeholder="******"
                    />
                  </div>
                  <div class="mb-3 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary col-12">
                      Simpan
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Section: Design Block -->
    <footer class="bg-white text-center text-lg-start">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: #f0f0f0">
        Copyright ©
        <a
          href="#"
          style="text-decoration: none"
          target="_blank"
          class="text-gray-800 text-dark text-hover-primary"
          >DINAS KOPERASI USAHA KECIL DAN MENENGAH KAB. TTU</a
        >
      </div>
      <!-- Copyright -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
