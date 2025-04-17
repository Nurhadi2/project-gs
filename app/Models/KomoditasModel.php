<?php

namespace App\Models;

use CodeIgniter\Model;

class KomoditasModel extends Model
{
    protected $table = 'tb_komoditas';
    protected $primaryKey = 'id_komoditas';
    protected $allowedFields = ['nama_komoditas', 'id_kategori'];
}
