<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table      = 'makanan'; // Nama tabel menu di database
    protected $primaryKey = 'id_makanan';   // Primary key dari tabel menu

    protected $allowedFields = ['jenis_makanan', 'makanan', 'foto', 'harga']; // Kolom yang diizinkan untuk diisi

    // Fungsi untuk menambahkan item menu ke database
    public function tambahMenu($data)
    {
        return $this->insert($data);
    }

    // Fungsi untuk mengambil daftar menu dari database
    public function getMenu()
    {
        $this->select('id_makanan, jenis_makanan, makanan, foto, harga');
        return $this->findAll();
    }
}
