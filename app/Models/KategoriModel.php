<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'jenismakanan';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['jenis_makanan', 'foto'];

    public function getKategori()
    {
        return $this->findAll();
    }
}