<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::beranda');

$routes->get('/login', 'Auth::login');
$routes->post('/auth/proses_login', 'Auth::proses_login');
$routes->post('/auth/proses_logout', 'Auth::proses_logout');

$routes->get('/beranda', 'Home::beranda'); //beranda untuk pelanggan
$routes->get('/menu', 'Makanan::index');
$routes->get('/detailmenu/(:num)', 'Makanan::detailmenu/$1');
$routes->get('/pesan/(:num)', 'Makanan::pesan/$1');
$routes->post('/pesanan/checkout', 'Pesanan::process');

$routes->get('/dasboard', 'Home::owner'); //dashboard untuk owner

$routes->get('/akun', 'Akun::index');
$routes->get('/akun/tambah', 'Akun::tambah');
$routes->post('/akun/simpan', 'Akun::simpan');
$routes->get('/akun/hapusAkun/(:num)', 'Akun::hapusAkun/$1');
$routes->post('/akun/editAkun/(:num)', 'Akun::editAkun/$1');

$routes->get('/pegawai', 'Pegawai::index');
$routes->get('/pegawai/tambah', 'Pegawai::tambahpegawai');
$routes->delete('/Pegawai/hapusPegawai/(:num)', 'Pegawai::hapusPegawai/$1');
$routes->post('/Pegawai/editPegawai/(:num)', 'Pegawai::editPegawai/$1');
$routes->post('/pegawai/simpanPegawai', 'Pegawai::simpanPegawai');

$routes->get('/datapesanan', 'Pesanan::datapesanan');
$routes->get('/datamakanan', 'Makanan::datamakanan');
$routes->get('/history', 'History::index');

$routes->get('/dashboard', 'Home::index'); //dashboard untuk admin

$routes->get('/Pesanan/getStatus', 'Pesanan::getStatus');
$routes->get('/persetujuan', 'Pesanan::persetujuan');
$routes->get('/disetujui', 'Pesanan::disetujui');
$routes->get('/dibatalkan', 'Pesanan::dibatalkan');
$routes->get('/selesai', 'Pesanan::selesai');

$routes->get('/status', 'Pesanan::index');
$routes->get('/pesanan/updateStatus/(:num)', 'Pesanan::updateStatus/$1');
$routes->get('/pesanan/updateStatusTolak/(:num)', 'Pesanan::updateStatusTolak/$1');
$routes->get('/pesanan/updateStatusSelesai/(:num)', 'Pesanan::updateStatusSelesai/$1');

$routes->get('/datakategori', 'Kategori::datakategori');
$routes->get('/tambahkategori', 'Kategori::tambahkategori');
$routes->post('/Kategori/tambahKategoriMenu', 'Kategori::tambahKategoriMenu');
$routes->delete('/Kategori/hapusKategori/(:num)', 'Kategori::hapusKategori/$1');
$routes->post('/Kategori/editKategori/(:num)', 'Kategori::editKategori/$1');

$routes->get('/Makanan/(:num)', 'Makanan::datamenu/$1');
$routes->get('/tambahmenu/(:num)', 'Makanan::tambahmenu/$1');
$routes->post('/Makanan/tambahDataMenu', 'Makanan::tambahDataMenu');
$routes->delete('/Makanan/hapusMenu/(:num)', 'Makanan::hapusMenu/$1');
$routes->post('/Makanan/editMenu/(:num)', 'Makanan::editMenu/$1');











