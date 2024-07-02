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
