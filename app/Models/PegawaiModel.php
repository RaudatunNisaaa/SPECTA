<?php
namespace App\Models;

use CodeIgniter\Model;
class PegawaiModel extends Model
{
    protected $table = 'Pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['nama_pegawai', 'jenis_kelamin', 'phone', 'alamat', 'tugas'];

    public function getPegawai()
    {
        return $this->findAll();
    }

}
?>