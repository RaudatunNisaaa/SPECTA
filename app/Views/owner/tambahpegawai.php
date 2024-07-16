        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                        <h3 class="h3 mb-0 text-gray-800">Form Data Pegawai</h3>
                    </div>

                    <!-- Content Row -->
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                        <form action="/pegawai/simpanPegawai" method="post" id="formPegawai">
                        <div class="row">
                        <div class="col-lg-3"></div>
                            <div class="col-lg-12">
                        <div class="form-group">
                            <label for="nama_pegawai">Nama Pegawai</label>
                            <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" required>
                        </div>
                        <div class="form-group">
                        <label for="tugas">Tugas</label>
                            <select class="form-control" id="tugas" name="jenis_kelamin" required>
                                <option value="perempuan">Perempuan</option>
                                <option value="laki-laki">Laki-laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone">No. HP</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="tugas">Tugas</label>
                            <select class="form-control" id="tugas" name="tugas" required>
                                <option value="memasak">Memasak</option>
                                <option value="mengantar">Mengantar</option>
                                <option value="packing">Packing</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mb-5">Simpan</button>
                    </div>
                    </div>
                    </form>
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
