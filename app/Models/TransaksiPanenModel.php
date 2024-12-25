<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiPanenModel extends Model
{
    protected $table            = 'tb_transaksi_panen';
    protected $primaryKey       = 'id_transaksi_panen';
    protected $useAutoIncrement = true;

    protected $allowedFields    = ['bulan', 'tahun', 'id_lahan', 'total_area', 'produksi', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
