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
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="foto">Pilih gambar..</label>
                            </div>
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
        document.addEventListener('DOMContentLoaded', (event) => {
            const inputFile = document.querySelector('#foto');
            const inputLabel = document.querySelector('.custom-file-label');

            inputFile.addEventListener('change', (event) => {
                const fileName = event.target.files[0].name;
                inputLabel.textContent = fileName;
            });
        });
    </script>

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
        window.location.href = '';
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
