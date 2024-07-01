<?php
namespace App\Models;

use CodeIgniter\Model;
class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    protected $allowedFields = ['username', 'password', 'level'];
}
?>