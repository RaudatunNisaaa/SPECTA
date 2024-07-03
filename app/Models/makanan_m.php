<?php

namespace App\Models;

use CodeIgniter\Model;

class makanan_m extends Model
{
    protected $table = 'makanan';
    protected $primaryKey = 'id_makanan';
    protected $allowedFields = ['id_jenis', 'makanan', 'harga', 'foto'];

}
?>
