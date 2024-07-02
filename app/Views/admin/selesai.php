
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
                        <h1 class="h3 mb-0 text-gray-800">Selesai</h1>
                    </div>

                
                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pesanan Selesai</h6>
                                  
                                </div>
                                    <!-- Card Body -->
                    <div class="card-body">
                                <div class='container'>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Pelanggan</th>
                                                <th>No. hp</th>
                                                <th>Jumlah</th>
                                                <th>Tanggal Ambil</th>
                                                <th>Alamat</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // var_dump($tunggu);exit;
                                            $no=1;
                                             foreach ($selesai as $value) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($no++); ?></td>
                                                <td><?= htmlspecialchars($value['nama_pelanggan']); ?></td>
                                                <td><?= htmlspecialchars($value['phone']); ?></td>
                                                <td><?= htmlspecialchars($value['jumlah']); ?></td>
                                                <td><?= htmlspecialchars($value['tglAmbil']); ?></td>
                                                <td><?= htmlspecialchars($value['alamat']); ?></td>
                                                <td><?= htmlspecialchars($value['status']); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <!-- Data rows will be inserted here dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling


