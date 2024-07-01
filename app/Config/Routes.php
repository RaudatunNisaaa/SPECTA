<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::login');

$routes->get('/login', 'Home::login');
$routes->post('/auth/proses_login', 'Auth::proses_login');
$routes->post('/auth/proses_logout', 'Auth::proses_logout');

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










