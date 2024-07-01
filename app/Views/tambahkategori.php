<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/sb-admin-2.css">
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
                    <h6 class="m-0 font-weight-bold text-primary">Form Kategori Menu</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <div class="container">
                    <form action="/Kategori/tambahKategori" method="POST" id="formKategori">
                        <div class="form-group">
                            <label for="jenis_makanan">Kategori Menu</label>
                            <input type="text" class="form-control" id="jenis_makanan" name="jenis_makanan" autofocus>
                            <div id="error_jenis_makanan" class="invalid-feedback"></div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="text" class="form-control" id="foto" name="foto">
                            <div id="error_foto" class="invalid-feedback"></div>
                        </div>
                        <div>
                            <button type="button" onclick="tambahkategori()" class="btn btn-primary">Tambah Kategori</button>
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
<script src="/asset/vendor/jquery/jquery.min.js"></script>
<script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="/asset/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="/asset/js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="/asset/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="/asset/js/demo/chart-area-demo.js"></script>
<script src="/asset/js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function tambahkategori() {
            var form = document.getElementById('formKategori');
            var formData = new FormData(form);

            fetch('/Kategori/tambahKategoriMenu', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        text: "Berhasil menambahkan kategori menu!",
                        icon: "success"
                    }).then(() => {
                        window.location.href = '/datakategori';
                    });
                } else {
                    displayErrors(data.errors);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    text: "Gagal menambahkan kategori menu",
                    icon: "error"
                });
            });
        }

        function batal() {
            window.location.href = '/datakategori';
        }

        function displayErrors(errors) {
            resetErrors();
            if (errors.jenis_makanan) {
                var errorJenisMakanan = document.getElementById('error_jenis_makanan');
                errorJenisMakanan.textContent = errors.jenis_makanan;
                document.getElementById('jenis_makanan').classList.add('is-invalid');
            }
        }

        function resetErrors() {
            var errorJenisMakanan = document.getElementById('error_jenis_makanan');
            errorJenisMakanan.textContent = '';
            document.getElementById('jenis_makanan').classList.remove('is-invalid');
        }

        function resetForm() {
            document.getElementById('formKategori').reset();
            resetErrors();
        }
    </script>
</body>
</html>
