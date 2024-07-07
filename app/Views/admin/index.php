<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/sb-admin-2.css') ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        .navbar {
            position: fixed;
            width: calc(100% - 225px);
            top: 0;
            z-index: 1000;
        }
        body {
            padding-top: 0;
        }
        #accordionSidebar {
            z-index: 1;
            position: fixed;
            top: 0;
        }
        #content-wrapper {
            padding-top: 80px; 
        }
    </style>
</head>
<body>

    <!-- Topbar Navbar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <div class="input-group">
                <h5>Selamat Datang Admin!</h5>
            </div>
            <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                    <a class="dropdown-item" href="#" onclick="logout()">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
            </li>

        </ul>
        </nav>
            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-900">Dashboard</h1>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Butuh Persetujuan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <a href='/persetujuan' id='user_approval'><i class="fas fa-link"></i> <?= $tunggu ?></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Disetujui</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <a href='/disetujui' id='user_approved'><i class="fas fa-link"></i> <?= $disetujui ?></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Selesai
                                        </div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <a href='/selesai' id='user_finish'><i class="fas fa-link"></i> <?= $selesai ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Dibatalkan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <a href='/dibatalkan' id='user_canceled'><i class="fas fa-link"></i> <?= $dibatalkan ?></a>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Sumber Penghasilan</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                        aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Dropdown Header:</div>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-primary"></i> Butuh Persetujuan
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i> Disetujui
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-info"></i> Selesai
                                    </span>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-warning"></i> Dibatalkan
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        $(document).ready(function() {
            $.get("/Pesanan/getStatus", function(result) {
                if (result.status) {
                    document.getElementById("user_approval").innerHTML = result.data.tunggu;
                    document.getElementById("user_approved").innerHTML = result.data.disetujui;
                    document.getElementById("user_canceled").innerHTML = result.data.dibatalkan;
                    document.getElementById("user_finish").innerHTML = result.data.selesai;

                    var ctx = document.getElementById("myPieChart");
                    var myPieChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ["Butuh Persetujuan", "Disetujui", "Selesai", "Dibatalkan"],
                            datasets: [{
                                data: [result.data.tunggu, result.data.disetujui, result.data.selesai, result.data.dibatalkan],
                                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', "#f6c23e"],
                                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', "#f6c23e"],
                                hoverBorderColor: "rgba(234, 236, 244, 1)",
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                caretPadding: 10,
                            },
                            legend: {
                                display: false
                            },
                            cutoutPercentage: 80,
                        },
                    });
                } else {
                    Swal.fire({
                        text: "Data tidak ada"
                    });
                }
            }, "json");
        });

        function logout() {
            Swal.fire({
                text: "Apakah Anda yakin ingin logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/auth/proses_logout`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            window.location.href = "/login";
                        } else {
                            Swal.fire({
                                text: 'Logout gagal!',
                                icon: 'error'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire({
                            text: 'Terjadi kesalahan!',
                            icon: 'error'
                        });
                    });
                }
            });
        }
    </script>
</body>
</html>
