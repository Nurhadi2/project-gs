<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisKomoditasModel extends Model
{
    protected $table            = 'tb_jenis_komoditas';
    protected $primaryKey       = 'id_jenis_komoditas';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['name_jenis_komoditas'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
