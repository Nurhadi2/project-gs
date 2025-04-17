<?php

namespace App\Models;

use CodeIgniter\Model;

class PetaniModel extends Model
{
    protected $table      = 'tb_petani';
    protected $primaryKey = 'id_petani';
    protected $allowedFields = ['alamat', 'nama_lengkap', 'handphone', 'nik', 'id_user', 'id_kelompok_tani'];
    protected $useTimestamps = true; // If your table has created_at and updated_at columns, otherwise remove this line

    // Define any additional methods if needed
}
