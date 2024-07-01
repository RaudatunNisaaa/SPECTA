<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed; height: 100%;">
            <style>
                #accordionSidebar {
                    z-index: 1;
                }
            </style>
            <style>
                #content-wrapper {
                    margin-left: 225px; /* Adjust this value based on the width of your sidebar */
                }
            </style>

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand bg-gradient-warning d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon">
                <img style="width: 55px" src="img/logo.png" alt="">
            </div>
                <div class="sidebar-brand-text mx-3"> Catering Rosita </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pesanan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilih Kategori Pesanan:</h6>
                        <a class="collapse-item" href="/persetujuan">Persetujuan</a>
                        <a class="collapse-item" href="/disetujui">Disetujui</a>
                        <a class="collapse-item" href="/dibatalkan">Dibatalkan</a>
                        <a class="collapse-item" href="/selesai">Selesai</a>
                    </div>
                    
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Konfigurasi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Konfigurasi:</h6>
                        <a class="collapse-item" href="/datakategori">Kelola Menu</a>

                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->

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