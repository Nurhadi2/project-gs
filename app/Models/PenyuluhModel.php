<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyuluhModel extends Model
{
    protected $table            = 'tb_penyuluh';
    protected $primaryKey       = 'id_penyuluh';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['alamat', 'nama_lengkap', 'handphone', 'nik', 'id_user', 'id_kecamatan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
