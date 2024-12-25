<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiTanamModel extends Model
{
    protected $table            = 'tb_transaksi_tanam';
    protected $primaryKey       = 'id_transaksi_tanam';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['bulan', 'tahun', 'id_lahan', 'total_area', 'urea', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
