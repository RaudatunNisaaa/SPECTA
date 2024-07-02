<!DOCTYPE html>
<html leng>

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


<div class="container-fluid page-header py-5">
    <h1 class="text-center text-primary display-6">Menu</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="/beranda">Beranda</a></li>
        <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
    </ol>
</div>

<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start">
                    <h1>Menu</h1>
                </div>
            </div>
            <div class="row g-4">
                <!-- Menu Item 1 -->
                <?php foreach ($menu as $item) : ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img">
                                <!-- <img src="<?= base_url('/assets/img/') . $item['foto']; ?>" class="img-fluid w-100 rounded-top" alt="<?= $item['makanan']; ?>"> -->
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?= $item['jenis_makanan']; ?></div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4><?= $item['makanan']; ?></h4>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">Rp.<?= number_format($item['harga'], 0, ',', '.'); ?>/box</p>
                                    <a href="/menu/pesan/<?= $item['id_makanan']; ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> pesan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Menu Item 2 -->

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

</html>