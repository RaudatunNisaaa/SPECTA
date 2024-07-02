<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/sb-admin-2.css'); ?>">
    <title>Daftar Makanan</title>
</head>
<body>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid" style="margin-top: 0;">
                <!-- Content Row -->
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-2 mt-0">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                                <a class="btn btn-primary mx-3 my-1" style="width: 220px;" href="/tambahmenu/<?= esc($id_jenis); ?>">
                                    (+) Tambah Data Menu
                                </a>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
    <div class="container">
        <table class="table table-bordered my-0">
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
                <input type="text" id="edit_makanan" class="swal2-input" placeholder="Makanan">
                <input type="text" id="edit_harga" class="swal2-input" placeholder="Harga">
                <input type="text" id="edit_foto" class="swal2-input" placeholder="Foto">
            `,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            preConfirm: () => {
                const makanan = Swal.getPopup().querySelector('#edit_makanan').value;
                const harga = Swal.getPopup().querySelector('#edit_harga').value;
                const foto = Swal.getPopup().querySelector('#edit_foto').value;
                if (!makanan || !harga || !foto) {
                    Swal.showValidationMessage('Makanan, Harga, dan Foto tidak boleh kosong');
                    return false;
                }
                return { makanan: makanan, harga: harga, foto: foto };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/Makanan/editMenu/${id_makanan}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(result.value)
                })
                .then(() => {
                    Swal.fire({
                        text: 'Menu berhasil diubah!',
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Menu gagal diubah.',
                        'error'
                    );
                });
            }
        });
    }    
</script>
</body>
</html>
