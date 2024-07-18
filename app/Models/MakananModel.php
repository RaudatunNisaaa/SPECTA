<?php

namespace App\Models;

use CodeIgniter\Model;

class MakananModel extends Model
{
    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    protected $allowedFields = ['id_jenis', 'makanan', 'harga', 'foto'];

    public function getJenis()
    {
        $builder = $this->db->table('makanan');
        $builder->select('makanan.id_makanan, makanan.makanan, makanan.harga, makanan.foto AS foto_makanan, jenismakanan.jenis_makanan, jenismakanan.foto AS foto_jenis_makanan');
        $builder->join('jenismakanan', 'makanan.id_jenis = jenismakanan.id_jenis');
        $query = $builder->get();
        return $query->getResultArray(); 
    }

    public function getMakanan($id_jenis = false)
    {
        if ($id_jenis === false) {
            return $this->join('jenismakanan','jenismakanan.id_jenis=makanan.id_jenis')->findAll();
        }

        return $this->where(['makanan.id_jenis' => $id_jenis])->findAll();
    }
}
?>
