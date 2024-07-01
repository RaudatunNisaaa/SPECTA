<?php
namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['id_makanan', 'jumlah', 'nama_pelanggan', 'phone', 'tglAmbil', 'alamat', 'status'];

    // Method untuk mengambil data status
    public function getStatusCounts()
    {
        $data = [];

        $data['tunggu'] = $this->where('status', 'Tunggu')->countAllResults();
        $data['disetujui'] = $this->where('status', 'Disetujui')->countAllResults();
        $data['selesai'] = $this->where('status', 'Selesai')->countAllResults();
        $data['dibatalkan'] = $this->where('status', 'Dibatalkan')->countAllResults();

        return $data;
    }

    // public function getPesanan()
    // {
    //     return $this->findAll();
    // }
}
