<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    protected $allowedFields = ['id_jenis', 'makanan', 'harga', 'foto'];

    public function getMakanan($id_jenis = false)
    {
        if ($id_jenis === false) {
            return $this->findAll();
        }

        return $this->where(['id_jenis' => $id_jenis])->findAll();
    }
}
?>
