<!DOCTYPE html>
<html leng>

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

    <script>
        function calculateTotal() {
            const harga = <?php echo $pesan['harga']; ?>;
            const jumlah = document.querySelector('input[name="jumlah"]').value;
            const total = harga * jumlah;
            document.querySelector('input[name="total"]').value = `Rp. ${total.toLocaleString('id-ID')}`;
        }
    </script>
</head>

<body>
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-primary display-6">Pesanan</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
            <li class="breadcrumb-item"><a href="/keranjang/checkout">Pesanan</a></li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5 text-center">
            <h1 class="mb-4">Detail Pesanan</h1>
            <form action="<?= base_url('/checkout/process'); ?>" method="post">
                <div class="row g-5 justify-content-center">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Jenis Makanan</label>
                                <input type="text" class="form-control" value="<?php echo $pesan['makanan'] ?>" readonly>
                                <input type="hidden" class="form-control" name="id_makanan" value="<?php echo $pesan['id_makanan'] ?>" readonly>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Makanan</label>
                                <input type="text" class="form-control" value="<?php echo $pesan['makanan'] ?>" readonly>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Harga</label>
                                <input type="text" class="form-control" value="Rp. <?php echo number_format($pesan['harga'], 0, ',', '.'); ?>" readonly>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Jumlah</label>
                                <input type="number" class="form-control form-control-sm" name="jumlah" oninput="calculateTotal()" placeholder="*Min 35 Porsi">
                                <!-- <small class="form-text text-muted">*Minimal pesan 35 porsi</small> -->
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Total</label>
                                <input type="text" class="form-control" name="total" readonly>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Nama</label>
                                <input type="text" class="form-control" name="nama_pelanggan">
                            </div>

                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">No.HP <sup>*</sup></label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Alamat <sup>*</sup></label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Tanggal Pengambilan<sup>*</sup></label>
                                <input type="date" class="form-control" name="tanggal_pengambilan">
                            </div>
                            <div class="form-item w-100 text-center mt-4">
                                <button type="submit" class="btn btn-primary" style="background-color: blue; color: white;" onclick="return confirm('Apakah Anda yakin ingin memesan?');">Selesai</button>
                            </div>
                        </div>
            </form>
        </div>
    </div>
</body>

</html>