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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
                        <h1 class="h3 mb-0 text-gray-800">Kelola Data Menu</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4 mt-3">
                    <div class="card-header py-3">
                    <a class="btn btn-primary mx-3 my-1" style="width: 220px;" href="/tambahmenu/<?= esc($id_jenis); ?>">
                                        (+) Tambah Data Menu
                                    </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                <tr>
                    <th>NO</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($makanan) && is_array($makanan)): ?>
                    <?php
                    $no = 1;
                         foreach ($makanan as $value) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($value['makanan']); ?></td>
                            <td class="text-center"><?= esc($value['harga']); ?></td>
                            <td class="text-center"><img src="/img/<?= esc($value['foto']); ?>" alt="Foto Menu" style="width: 100px; height: auto;"></td>
                            <td class="text-center">
                                <div style="display: flex; justify-content: center; gap: 10px;">
                                    <button class='btn btn-warning' title="Edit" onclick="editMenu(<?= esc($value['id_makanan']); ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class='btn btn-danger' title="Hapus" onclick="hapusMenu(<?= esc($value['id_makanan']); ?>)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Tidak ada data makanan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


    </div>
</div>

</div>
                </div>
                <!-- /.container-fluid -->
            </div>
            </div>
            <!-- End of Main Content -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?= base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
    function hapusMenu(id_makanan) {
        Swal.fire({
            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/Makanan/hapusMenu/${id_makanan}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            text: 'Menu berhasil dihapus!',
                            icon: 'success'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: 'Menu gagal dihapus!',
                            icon: 'error'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Menu gagal dihapus.',
                        'error'
                    );
                });
            }
        });
    }

    function editMenu(id_makanan) {
    Swal.fire({
        title: 'Edit Menu',
        html: `
            <form id="editMenuForm" enctype="multipart/form-data">
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_makanan" class="form-label">Menu</label>
                    <input type="text" id="edit_makanan" name="makanan" class="form-control" placeholder="">
                </div>
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_harga" class="form-label">Harga</label>
                    <input type="text" id="edit_harga" name="harga" class="form-control" placeholder="">
                </div>
                <div class="form-group" style="text-align: left;">
                    <label for="edit_foto" class="form-label">Foto</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="edit_foto" name="foto">
                        <label for="edit_foto" class="custom-file-label">Pilih gambar..</label>
                    </div>
                </div>
            </form>
        `,
        showCancelButton: true,
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#3085d6',
        didOpen: () => {
            const inputFile = document.querySelector('#edit_foto');
            const inputLabel = document.querySelector('.custom-file-label');

            inputFile.addEventListener('change', (event) => {
                const fileName = event.target.files[0].name;
                inputLabel.textContent = fileName;
            });
        },
        preConfirm: () => {
            const form = Swal.getPopup().querySelector('#editMenuForm');
            const formData = new FormData(form);

            const makanan = formData.get('makanan');
            const harga = formData.get('harga');
            const foto = formData.get('foto');

            if (!makanan || !harga || !foto) {
                Swal.showValidationMessage('Makanan, Harga, dan Foto tidak boleh kosong');
                return false;
            }

            return formData;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const formData = result.value;

            fetch(`/Makanan/editMenu/${id_makanan}`, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Response data:', data); // Debugging line to check the response data
                if (data.success) {
                    Swal.fire({
                        text: 'Data menu berhasil diubah!',
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                } else {
                    Swal.fire(
                        'Gagal!',
                        'Data menu gagal diubah.',
                        'error'
                    );
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire(
                    'Gagal!',
                    'Data menu gagal diubah.',
                    'error'
                );
            });
        }
    });
}

</script>
</body>
</html>
