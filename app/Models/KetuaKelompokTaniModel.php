<?php

namespace App\Models;

use CodeIgniter\Model;

class KetuaKelompokTaniModel extends Model
{
    protected $table            = 'tb_ketua_kelompok_tani';
    protected $primaryKey       = 'id_ketua_kelompok_tani';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['alamat', 'nama_lengkap', 'handphone', 'nik', 'id_user'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
