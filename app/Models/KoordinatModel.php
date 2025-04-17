<?php

namespace App\Models;

use CodeIgniter\Model;

class KoordinatModel extends Model
{
    protected $table      = 'tb_koordinat';
    protected $primaryKey = 'id_koordinat';
    protected $allowedFields = ['id_lahan', 'latitude', 'longitude', 'created_at', 'updated_at'];
    protected $useTimestamps = true; // If your table has created_at and updated_at columns, otherwise remove this line

    // Define any additional methods if needed
}
