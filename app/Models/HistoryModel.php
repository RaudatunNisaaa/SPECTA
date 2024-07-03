<?php
namespace App\Models;

use CodeIgniter\Model;

class HistoryModel extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'id_history';
    protected $allowedFields = ['id_pesanan', 'id_makanan', 'id_akun', 'nama_pelanggan', 'phone', 'jumlah', 'tglAmbil', 'alamat', 'status'];
    protected $returnType = 'array';
    protected $useTimestamps = false;

    // Method untuk mengambil data status
    

    // public function getPesanan()
    // {
    //     return $this->findAll();
    // }
}
