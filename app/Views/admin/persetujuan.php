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
                    <h1 class="h3 mb-0 text-gray-800">Persetujuan</h1>
                </div>

                <!-- Card Body -->
                <div class="card shadow mb-4 mt-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pesanan Butuh Persetujuan</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                             foreach ($tunggu as $value) : ?>
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
                                                        <!-- <a target="_blank" href="https://wa.me/?text=Permintaan%20pesananan%20Anda%20telah%20disetujui." class='btn btn-primary'>Setujui via WhatsApp</a> -->
                                                        <a href="/pesanan/updateStatus/<?= $value["id_pesanan"] ?>" target="_blank"><button class='btn btn-primary'>Setujui</button></a>
                                                        <a href="/pesanan/updateStatusTolak/<?= $value["id_pesanan"] ?>" target="_blank"><button class='btn btn-danger'>Tolak</button></a>
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
<!-- Page level plugins -->
<script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="/assets/js/demo/datatables-demo.js"></script>
<script src="/asset/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="/asset/js/demo/chart-area-demo.js"></script>
<script src="/asset/js/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function dibatalkan(id) {
        $.get("<?= base_url('pesanan/updateStatus') ?>", {id: id, status: "Dibatalkan"}, function(result) {
            Swal.fire({
                text: "Berhasil menolak pesanan!",
                icon: "success"
            }).then(() => {
                location.reload();
            });
        }, "json");
    }

    function setujui(id) {
        $.get("<?= base_url('pesanan/updateStatus') ?>", {id: id, status: "Disetujui"}, function(result) {
            Swal.fire({
                text: "Berhasil menyetujui pesanan!",
                icon: "success"
            }).then(() => {
                location.reload();
            });
        }, "json");
    }
</script>
