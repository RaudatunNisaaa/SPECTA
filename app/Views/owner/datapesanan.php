<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Rosita</title>
</head>
<body>
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Menu</th>
                                            <th>No Hp</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pengambilan</th>
                                            <th>Alamat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach ($pesanan as $value) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($no++); ?></td>
                                                <td><?= htmlspecialchars($value['nama_pelanggan']); ?></td>
                                                <td><?= htmlspecialchars($value['makanan']); ?></td>
                                                <td><?= htmlspecialchars($value['phone']); ?></td>
                                                <td><?= htmlspecialchars($value['jumlah']); ?></td>
                                                <td><?= htmlspecialchars($value['tglAmbil']); ?></td>
                                                <td><?= htmlspecialchars($value['alamat']); ?></td>
                                                <td><?= htmlspecialchars($value['status']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
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

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>© Catering Rosita 2024</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>
</html>