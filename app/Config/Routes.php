<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::beranda');
$routes->get('/login', 'Auth::login');

$routes->get('/login', 'Home::login');
$routes->post('/auth/proses_login', 'Auth::proses_login');
$routes->post('/auth/proses_logout', 'Auth::proses_logout');

$routes->setTranslateURIDashes(true);
$routes->setAutoRoute(true);
$routes->get('/beranda', 'Home::beranda');

$routes->get('/menu', 'Menu::index');
$routes->post('/pesanan/checkout', 'Checkout::process');
$routes->get('/menu/pesan/(:num)', 'Menu::pesan/$1');
$routes->get('/detailmenu/(:num)', 'Menu::detailmenu/$1');
$routes->get('/history', 'History::index');

$routes->get('/dasboard', 'Home::owner');
$routes->get('/akun', 'Akun::index');
$routes->get('/pegawai', 'Pegawai::index');

$routes->get('/akun/tambah', 'Akun::tambah');
$routes->post('/akun/simpan', 'Akun::simpan');

$routes->get('/dashboard', 'Home::index');
$routes->get('/persetujuan', 'Home::persetujuan');
$routes->get('/disetujui', 'Home::disetujui');
$routes->get('/dibatalkan', 'Home::dibatalkan');
$routes->get('/selesai', 'Home::selesai');

$routes->get('/Pesanan/getStatus', 'Pesanan::getStatus');
$routes->get('/status', 'Pesanan::index');
$routes->get('/pesanan/updateStatus/(:num)', 'Pesanan::updateStatus/$1');
$routes->get('/pesanan/updateStatusTolak/(:num)', 'Pesanan::updateStatusTolak/$1');
$routes->get('/pesanan/updateStatusSelesai/(:num)', 'Pesanan::updateStatusSelesai/$1');

$routes->get('/datamenu', 'Makanan::datamenu');
$routes->get('/tambahmenu/(:num)', 'Makanan::tambahmenu/$1');
$routes->post('/Makanan/tambahDataMenu', 'Makanan::tambahDataMenu');
$routes->get('/Makanan/(:num)', 'Makanan::datamenu/$1');
$routes->delete('/Makanan/hapusMenu/(:num)', 'Makanan::hapusMenu/$1');
$routes->post('/Makanan/editMenu/(:num)', 'Makanan::editMenu/$1');

$routes->get('/datakategori', 'Kategori::datakategori');
$routes->get('/tambahkategori', 'Kategori::tambahkategori');
$routes->post('/Kategori/tambahKategoriMenu', 'Kategori::tambahKategoriMenu');
$routes->delete('/Kategori/hapusKategori/(:num)', 'Kategori::hapusKategori/$1');
$routes->post('/Kategori/editKategori/(:num)', 'Kategori::editKategori/$1');










