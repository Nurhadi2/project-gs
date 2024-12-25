<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisKepemilikanModel extends Model
{
    protected $table = 'tb_jenis_kepemilikan';
    protected $primaryKey = 'id_jenis_kepemilikan';
    protected $allowedFields = ['nama_jenis_kepemilikan'];
}
