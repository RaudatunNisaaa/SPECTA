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
                    <h1 class="h3 mb-0 text-gray-800">Disetujui</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Pesanan yang Sudah Disetujui</h6>
                              
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
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // var_dump($tunggu);exit;
                                            $no=1;
                                             foreach ($disetujui as $value) : ?>
                                            <tr>
                                                <td><?= htmlspecialchars($no++); ?></td>
                                                <td><?= htmlspecialchars($value['nama_pelanggan']); ?></td>
                                                <td><?= htmlspecialchars($value['phone']); ?></td>
                                                <td><?= htmlspecialchars($value['jumlah']); ?></td>
                                                <td><?= htmlspecialchars($value['tglAmbil']); ?></td>
                                                <td><?= htmlspecialchars($value['alamat']); ?></td>
                                                <td><?= htmlspecialchars($value['status']); ?></td>
                                                <td>
                                                    <div style="display: flex; gap: 10px;">
                                                    <a href="/pesanan/updateStatusSelesai/<?= $value["id_pesanan"] ?>" target="_blank"><button class='btn btn-success'>Selesai</button></a>
                                                    </div>
                                                </td>
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
            <!-- /.container-fluid -->

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
    function selesai(id) {
        $.get("<?= base_url('pesanan/updateStatus') ?>", {id: id, status: "Selesai"}, function(result) {
            Swal.fire({
                text: "Berhasil menyelesaikan pesanan!",
                icon: "success"
            }).then(() => {
                location.reload();
            });
        }, "json");
    }
</script>                                                       