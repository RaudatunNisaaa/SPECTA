<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catering Rosita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('/assest'); ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('/assest'); ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assest'); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assest'); ?>/css/style.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <style>
        .text-blue {
            color: blue;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar start -->
    <div class="container-fluid fixed-top">
        <div class="container topbar bg-white d-none d-lg-block text-blue">
        </div>
        <div class="container px-0">
            <nav class="navbar navbar-light bg-white navbar-expand-xl">
                <a href="index.html" class="navbar-brand">
                    <h1 class="text-primary display-6 text-blue">Catering Rosita</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto text-blue">
                        <a href="beranda" class="nav-item nav-link active text-blue">Beranda</a>
                        <a href="menu" class="nav-item nav-link text-blue">Menu</a>
                        <a href="pesanan" class="nav-item nav-link text-blue">Pesanan</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="container-fluid py-5 mb-5 hero-header text-blue">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-md-12 col-lg-7">
                    <h4 class="mb-3 text-primary text-blue">Selamat Datang</h4>
                    <h1 class="mb-5 display-3 text-primary text-blue">Catering Rosita</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assest'); ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url('assest'); ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('assest'); ?>/lib/lightbox/js/lightbox.min.js"></script>
    <script src="<?= base_url('assest'); ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('assest'); ?>/js/main.js"> </script>
</body>

</html>