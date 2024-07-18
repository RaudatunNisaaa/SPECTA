<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pegawai</title>
</head>
<body>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                        <h3 class="h3 mb-0 text-gray-800">Kelola Data Pegawai</h3>
                        <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="width: 200px; height: 30px;" href="/pegawai/tambah">
                            (+) Tambah Data Pegawai
                        </a>
                    </div>

                    <!-- Content Row -->
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Hp</th>
                                            <th>Alamat</th>
                                            <th>Tugas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        // var_dump($akun);exit;
                                        foreach($pegawai as $a){
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $a['nama_pegawai']; ?></td>
                                            <td><?= $a['jenis_kelamin']; ?></td>
                                            <td><?= $a['phone']; ?></td>
                                            <td><?= $a['alamat']; ?></td>
                                            <td><?= $a['tugas']; ?></td>
                                            <td>
                                                <div style="display: flex; justify-content: center; gap: 10px;">
                                                <button class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#editAkunModal<?php echo $a['id_pegawai']?>">
    <i class="fas fa-edit"></i> Edit
</button>
                                                    <button class="btn btn-danger" title="Hapus" onclick="hapusPegawai(<?= esc($a['id_pegawai']); ?>)">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
                </div>
                <!-- End of Container Fluid -->
            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
    function hapusPegawai(id_pegawai) {
        Swal.fire({
            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/Pegawai/hapusPegawai/${id_pegawai}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            text: 'Data pegawai berhasil dihapus!',
                            icon: 'success'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: 'Data pegawai gagal dihapus!',
                            icon: 'error'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Data pegawai gagal dihapus.',
                        'error'
                    );
                });
            }
        });
    
    }    
</script>
<?php
foreach ($pegawai as $a) {
?>
<div class="modal fade" id="editAkunModal<?php echo $a['id_pegawai'] ?>" tabindex="-1" role="dialog" aria-labelledby="editAkunModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAkunModalLabel">Edit Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAkunForm" action="/Pegawai/editPegawai/<?php echo $a['id_pegawai'] ?>" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
            <div class="mb-3" style="text-align: left;">
                    <label for="edit_nama_pegawai" class="form-label">Nama Pegawai</label>
                    <input type="text" id="edit_nama_pegawai" name="nama_pegawai" value="<?php echo $a['nama_pegawai'] ?>" class="form-control" placeholder="">
                </div>
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select id="edit_jenis_kelamin" name="jenis_kelamin" class="form-control">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_phone" class="form-label">No. HP</label>
                    <input type="text" id="edit_phone" name="phone" value="<?php echo $a['phone'] ?>" class="form-control" placeholder="">
                </div>
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_alamat" class="form-label">Alamat</label>
                    <input type="text" id="edit_alamat" name="alamat" value="<?php echo $a['alamat'] ?>" class="form-control" placeholder="">
                </div>
                    <div class="mb-3">
                        <label for="edit_level" class="form-label">Tugas</label>
                      
                        <select id="edit_tugas" name="tugas" class="form-control">
                        <option <?php echo $a['tugas']=='memasak'?'selected':'' ?> value="memasak">Memasak</option>
                        <option <?php echo $a['tugas']=='mengantar'?'selected':'' ?> value="mengantar">Mengantar</option>
                        <option <?php echo $a['tugas']=='packing'?'selected':'' ?> value="packing">Packing</option>
                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php } ?>

</body>
</html>