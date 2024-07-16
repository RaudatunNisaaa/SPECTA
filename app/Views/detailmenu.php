<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Catering Rosita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts  -->
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
</head>

<body>
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-primary display-6">Menu</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
            <li class="breadcrumb-item active" style="color: white;">Detail Menu</li>
        </ol>
    </div>

    <div id="tab-3" class="container mt-5 tab-fane fade show">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <?php if (!empty($makanan) && is_array($makanan)): ?>
                        <?php foreach ($makanan as $value): ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="/img/<?= esc($value['foto']); ?>" class="card-img-top" alt="Foto Menu" style="object-fit: cover; width: 100%; height: 100%; aspect-ratio: 1;">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?= esc($value['jenis_makanan']); ?></div>                    
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4 class="card-title"><?= esc($value['makanan']); ?></h4>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-0">Rp.<?= number_format($value['harga'], 0, ',', '.'); ?> / box</p>
                                            <a href="/pesan/<?= $value['id_makanan']; ?>" class="btn border border-secondary rounded-pill mt-3 px-3 text-primary d-block mx-auto">
                                                <i class="fa fa-shopping-bag me-2 text-primary"></i> pesan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-md-12">
                            <p class="text-center">Belum ada data makanan.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Start -->
    <!-- <div class="container-fluid copyright bg-light py-4 mt-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-dark"><a href="#"><i class="fas fa-copyright text-dark me-2"></i>Catering Rosita</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-dark">
                        <!-/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        <!-- Created By <a class="border-bottom" >SPECTA<a class="border-bottom"></a>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Copyright End -->
        
            <script>
                    // Fungsi untuk menambahkan item ke keranjang
                    $('.add-to-cart').click(function() {
                        // Ambil data nama dan harga dari atribut data
                        var name = $(this).data('name');
                        var price = $(this).data('price');

                        // Kirim permintaan POST ke server
                        $.post('/menu/tambahKeKeranjang', {
                            nama: name,
                            harga: price
                        }, function(data) {
                            // Tampilkan pesan atau lakukan sesuatu setelah item ditambahkan ke keranjang
                            alert('Item ditambahkan ke keranjang!');
                        });
                    });
                </script>
</body>
</html>
