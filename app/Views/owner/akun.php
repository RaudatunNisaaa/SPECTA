<!-- Sidebar -->
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid mt-4">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Kelola Data Akun</h1>

                <a href="/akun/tambah" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="width: 140px; height: 30px;">
                    (+) Tambah Akun
                </a>
            </div>
            <!-- /.d-sm-flex -->

            <!-- Content Row -->
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Akun</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($akun as $a) {
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $a['username']; ?></td>
                                        <td><?= $a['password']; ?></td>
                                        <td><?= $a['level']; ?></td>
                                        <td>
                                            <div style="display: flex; justify-content: center; gap: 10px;">
                                            <button class="btn btn-warning" title="Edit" data-toggle="modal" data-target="#editAkunModal<?php echo $a['id_akun']?>">
    <i class="fas fa-edit"></i> Edit
</button>

                                               <a href="/akun/hapusAkun/<?php echo $a['id_akun'] ?>"> <button class="btn btn-danger" title="Hapus" onclick="return confirm('Apakah yakin hapus data ?')"">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                </a>
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
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
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

<!-- Modal Edit Akun -->
<?php
foreach ($akun as $a) {
?>
<div class="modal fade" id="editAkunModal<?php echo $a['id_akun'] ?>" tabindex="-1" role="dialog" aria-labelledby="editAkunModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAkunModalLabel">Edit Data Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editAkunForm" action="/akun/editAkun/<?php echo $a['id_akun'] ?>" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_username" class="form-label">Username</label>
                        <input type="text" id="edit_username" name="username" value="<?php echo $a['username'] ?>" class="form-control" placeholder="Masukkan username">
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="form-label">Password</label>
                        <input type="password" id="edit_password" name="password" class="form-control" placeholder="Masukkan password" value="<?php echo $a['password'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="edit_level" class="form-label">Level</label>
                        <select id="edit_level" class="form-control" name="level">
                            <option <?php echo $a['level']=='admin'?'selected':'' ?> value="admin">Admin</option>
                            <option <?php echo $a['level']=='owner'?'selected':'' ?> value="owner">Owner</option>
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
