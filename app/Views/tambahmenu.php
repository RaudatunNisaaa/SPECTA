<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/sb-admin-2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <!-- Your HTML content -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrator</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Menu</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="container">
                    <form action="/Makanan/tambahDataMenu" method="POST" id="formMenu">
                        <input type="hidden" name="id_jenis" value="<?= esc($id_jenis); ?>">
                        <div class="form-group">
                            <label for="makanan">Nama Menu</label>
                            <input type="text" class="form-control" id="makanan" name="makanan">
                            <div id="error_makanan" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga">
                            <div id="error_harga" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="text" class="form-control" id="foto" name="foto">
                            <div id="error_foto" class="invalid-feedback"></div>
                        </div>
                        <div>
                            <button type="button" onclick="tambahmenu()" class="btn btn-primary">Tambah Menu</button>
                            <button type="button" onclick="batal()" class="btn btn-danger">Batal</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

        </div>
    </div>

<!-- Bootstrap core JavaScript-->
<script src="/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="/assets/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="/assets/js/demo/chart-area-demo.js"></script>
<script src="/assets/js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function tambahmenu() {
        var form = document.getElementById('formMenu');
        var formData = new FormData(form);

        fetch('/Makanan/tambahDataMenu', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    text: "Berhasil menambahkan data menu!",
                    icon: "success"
                }).then(() => {
                    window.location.href = '/Makanan/' + data.id_jenis;
                });
            } else {
                displayErrors(data.errors);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                text: "Gagal menambahkan data menu",
                icon: "error"
            });
        });
    }

    function batal() {
        window.location.href = '/datamenu';
    }

    function displayErrors(errors) {
        resetErrors();
        if (errors.makanan) {
            var errorMakanan = document.getElementById('error_makanan');
            errorMakanan.textContent = errors.makanan;
            document.getElementById('makanan').classList.add('is-invalid');
        }
        if (errors.harga) {
            var errorHarga = document.getElementById('error_harga');
            errorHarga.textContent = errors.harga;
            document.getElementById('harga').classList.add('is-invalid');
        }
        if (errors.foto) {
            var errorFoto = document.getElementById('error_foto');
            errorFoto.textContent = errors.foto;
            document.getElementById('foto').classList.add('is-invalid');
        }
    }

    function resetErrors() {
        var errorMakanan = document.getElementById('error_makanan');
        errorMakanan.textContent = '';
        document.getElementById('makanan').classList.remove('is-invalid');

        var errorHarga = document.getElementById('error_harga');
        errorHarga.textContent = '';
        document.getElementById('harga').classList.remove('is-invalid');

        var errorFoto = document.getElementById('error_foto');
        errorFoto.textContent = '';
        document.getElementById('foto').classList.remove('is-invalid');
    }

    function resetForm() {
        document.getElementById('formMenu').reset();
        resetErrors();
    }
</script>
</body>
</html>
