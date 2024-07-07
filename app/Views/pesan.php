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
            <li class="breadcrumb-item"><a href="/">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/menu">Menu</a></li>
            <li class="breadcrumb-item active" style="color: white;">Pesanan</li>
        </ol>
    </div>
    <div class="container-fluid py-5">
        <div class="container py-5 text-center">
            <h1 class="mb-4">Detail Pesanan</h1>
            <form action="<?= base_url('/pesanan/process'); ?>" method="post" id="formCheckout">
                <div class="row g-5 justify-content-center">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Jenis Makanan</label>
                                <input type="text" class="form-control" value="<?= $pesan['id_jenis'] ?>" readonly>
                                <input type="hidden" class="form-control" name="id_makanan" value="<?= $pesan['id_makanan'] ?>" readonly>
                                <div id="error_id_makanan" class="invalid-feedback"></div>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Makanan</label>
                                <input type="text" class="form-control" value="<?= $pesan['makanan'] ?>" readonly>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Harga</label>
                                <input type="text" class="form-control" value="Rp. <?= number_format($pesan['harga'], 0, ',', '.'); ?>" readonly>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Jumlah</label>
                                <input type="number" class="form-control form-control-sm" name="jumlah" oninput="calculateTotal()" placeholder="*Min 35 Porsi">
                                <div id="error_jumlah" class="invalid-feedback"></div>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Total</label>
                                <input type="text" class="form-control" name="total" readonly>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Nama</label>
                                <input type="text" class="form-control" name="nama_pelanggan">
                                <div id="error_nama_pelanggan" class="invalid-feedback"></div>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">No.Wa <sup>*</sup></label>
                                <input type="text" class="form-control" name="phone">
                                <div id="error_phone" class="invalid-feedback"></div>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Alamat <sup>*</sup></label>
                                <input type="text" class="form-control" name="alamat">
                                <div id="error_alamat" class="invalid-feedback"></div>
                            </div>
                            <div class="form-item w-100 text-start">
                                <label class="form-label my-3">Tanggal Pengambilan<sup>*</sup></label>
                                <input type="date" class="form-control" name="tanggal_pengambilan">
                                <div id="error_tanggal_pengambilan" class="invalid-feedback"></div>
                            </div>
                            <div class="form-item w-100 text-center mt-4">
                                <button type="button" class="btn btn-primary" style="background-color: blue; color: white;" onclick="selesai()">Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-light py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-dark"><a href="#"><i class="fas fa-copyright text-dark me-2"></i>Catering Rosita</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-dark">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Created By <a class="border-bottom" >SPECTA<a class="border-bottom"></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

<script src="<?= base_url('assest'); ?>/lib/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function selesai() {
        Swal.fire({
            text: 'Apakah Anda yakin ingin menyelesaikan pesanan?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-primary'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData(document.querySelector('#formCheckout'));

                fetch('/Pesanan/process', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            text: 'Terima kasih telah melakukan pemesanan. Kami akan segera menghubungi Anda.',
                            icon: 'success',
                            confirmButtonText: 'Oke',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/menu';
                            }
                        });
                    } else {
                        displayErrors(data.errors);
                    }
                })
                .catch(error => {
                    console.error('Fetch Error:', error);
                    Swal.fire({
                        text: 'Gagal menyelesaikan pesanan',
                        icon: 'error',
                        confirmButtonText: 'Oke',
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        }
                    });
                });
            }
        });
    }

</script>

</body>
</html>