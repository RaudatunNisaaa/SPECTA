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
                        <h1 class="h3 mb-0 text-gray-800 font-bold">Kelola Data Akun</h1>
                       
                        <a  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="width: 140px; height: 30px;" href="/akun/tambah">
                    (+) Tambah Akun
                </a>
                    </div>

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
                                        // var_dump($akun);exit;
                                        foreach($akun as $a){
                                        ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $a['username']; ?></td>
                                            <td><?= $a['password']; ?></td>
                                            <td><?= $a['level']; ?></td>
                                            <td>
                                            <div style="display: flex; justify-content: center; gap: 10px;">
                                                <button class="btn btn-warning" title="Edit" onclick="editAkun(<?= esc($a['id_akun']); ?>)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-danger" title="Hapus" onclick="hapusAkun(<?= esc($a['id_akun']); ?>)">
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
                    <!-- End of Content Row -->

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
    function hapusAkun(id_akun) {
        Swal.fire({
            text: "Anda tidak dapat mengembalikan data yang sudah dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/Akun/hapusAkun/${id_akun}`, {
                    method: 'DELETE'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            text: 'Data akun berhasil dihapus!',
                            icon: 'success'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            text: 'Data akun gagal dihapus!',
                            icon: 'error'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Data akun gagal dihapus.',
                        'error'
                    );
                });
            }
        });
    }

    function editAkun(id_akun) {
        Swal.fire({
            title: 'Edit Data Akun',
            html: `
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_username" class="form-label">Username</label>
                    <input type="text" id="edit_username" class="form-control" placeholder="Masukkan username">
                </div>
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_password" class="form-label">Password</label>
                    <input type="password" id="edit_password" class="form-control" placeholder="Masukkan password">
                </div>
                <div class="mb-3" style="text-align: left;">
                    <label for="edit_level" class="form-label">Level</label>
                    <select id="edit_level" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Simpan',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#3085d6',
            preConfirm: () => {
                const username = Swal.getPopup().querySelector('#edit_username').value;
                const password = Swal.getPopup().querySelector('#edit_password').value;
                const level = Swal.getPopup().querySelector('#edit_level').value;
                if (!username || !password || !level) {
                    Swal.showValidationMessage('Username, password dan level tidak boleh kosong');
                    return false;
                }
                return { username: username, password: password, level: level};
            }
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/Akun/editAkun/${id_akun}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(result.value)
                })
                .then(() => {
                    Swal.fire({
                        text: 'Data akun berhasil diubah!',
                        icon: 'success'
                    }).then(() => {
                        window.location.reload();
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Gagal!',
                        'Data akun gagal diubah.',
                        'error'
                    );
                });
            }
        });
    }    
</script>