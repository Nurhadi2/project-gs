<?php

namespace App\Models;

use CodeIgniter\Model;

class KoordinatKecamatanModel extends Model
{
    protected $table      = 'tb_koordinat_kecamatan';
    protected $primaryKey = 'id_koordinat_kecamatan';
    protected $allowedFields = ['id_kecamatan', 'latitude', 'longitude', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // If your table has created_at and updated_at columns, otherwise remove this line

    // Define any additional methods if needed
}
