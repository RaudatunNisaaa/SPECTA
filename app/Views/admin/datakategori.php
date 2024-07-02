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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Kelola Data Menu</h1>
                    </div>

                    <!-- Content Row -->
                <div class="row">

<!-- Area Chart -->
<div class="col-xl-12 col-lg-7">
    <div class="card shadow mb-2">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-2 d-flex flex-row align-items-center justify-content-between">
                <a class="btn btn-primary mx-3 my-1" style="width: 220px;" href="/tambahkategori">
                    (+) Tambah Kategori Menu
                </a>
        </div>
            <!-- <div class="my-3">
                
            </div> -->
        <!-- Card Body -->
        <div class="card-body">
            <div class='container'>
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kategori</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($kategori as $value) : ?>
                                <tr>
                                    <td class="text-center"><?= esc($no++); ?></td>
                                    <td class="text-center"><?= esc($value['jenis_makanan']); ?></td>
                                    <td class="text-center"><img src="/img/<?= esc($value['foto']); ?>" alt="Foto Kategori" style="width: 100px; height: auto;"></td>
                                    <td class="text-center">
                                        <div style="display: flex; justify-content: center; gap: 10px;">
                                            <button class="btn btn-warning" title="Edit" onclick="editKategori(<?= esc($value['id_jenis']); ?>)">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-danger" title="Hapus" onclick="hapusKategori(<?= esc($value['id_jenis']); ?>)">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <a href="/Makanan/<?= esc($value['id_jenis']); ?>" class="btn btn-secondary" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                        <?php endforeach; ?>

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
    function hapusKategori(id_jenis) {
        Swal.fire({
            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/Kategori/hapusKategori/${id_jenis}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            text: 'Kategori menu berhasil dihapus!',
                            icon: 'success'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: 'Kategori gagal dihapus!',
                            icon: 'error'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Kategori gagal dihapus.',
                        'error'
                    );
                });
            }
        });
    }

    function editKategori(id_jenis) {
        Swal.fire({
            title: 'Edit Kategori',
            html: `
                <input type="text" id="edit_jenis_makanan" class="swal2-input" placeholder="Jenis Makanan">
                <input type="text" id="edit_foto" class="swal2-input" placeholder="Foto">
            `,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            preConfirm: () => {
                const jenis_makanan = Swal.getPopup().querySelector('#edit_jenis_makanan').value;
                const foto = Swal.getPopup().querySelector('#edit_foto').value;
                if (!jenis_makanan || !foto) {
                    Swal.showValidationMessage('Kategori dan Foto tidak boleh kosong');
                    return false;
                }
                return { jenis_makanan: jenis_makanan, foto: foto };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/Kategori/editKategori/${id_jenis}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(result.value)
                })
                .then(() => {
                    Swal.fire({
                        text: 'Kategori berhasil diubah!',
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Kategori gagal diubah.',
                        'error'
                    );
                });
            }
        });
    }    
</script>
