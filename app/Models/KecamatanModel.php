<?php

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{
    protected $table      = 'tb_kecamatan';
    protected $primaryKey = 'id_kecamatan';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'nama_kecamatan'
    ];

    public function getDataForLandingPage()
    {
        $query = $this->db->table($this->table);
        $query->select('id_kecamatan, nama_kecamatan');

        $result = $query->get()->getResultArray();

        return $result;
    }
}
