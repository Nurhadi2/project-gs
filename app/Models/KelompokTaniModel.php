<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokTaniModel extends Model
{
    protected $table            = 'tb_kelompok_tani';
    protected $primaryKey       = 'id_kelompok_tani';

    protected $useAutoIncrement = true;

    protected $allowedFields    = ['nama_kelompok_tani', 'nama_ketua', 'alamat', 'id_kecamatan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function findAllwithRelation()
    {
        $query = $this->db->table($this->table);
        $query->select('tb_kelompok_tani.id_kelompok_tani, tb_kelompok_tani.nama_kelompok_tani, tb_kelompok_tani.nama_ketua id_ketua, tb_kelompok_tani.alamat, tb_kelompok_tani.id_kecamatan, tb_kecamatan.nama_kecamatan, SUM(IF(users.active = 1, 1, 0)) as jumlah_petani, tb_ketua_kelompok_tani.nama_lengkap as nama_ketua');
        $query->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan', 'left');
        $query->join('tb_petani', 'tb_petani.id_kelompok_tani = tb_kelompok_tani.id_kelompok_tani', 'left');
        $query->join('users', 'users.id = tb_petani.id_user', 'left');
        $query->join('tb_ketua_kelompok_tani', 'tb_ketua_kelompok_tani.id_ketua_kelompok_tani = tb_kelompok_tani.nama_ketua', 'left');
        $query->groupBy('tb_kelompok_tani.id_kelompok_tani');

        $result = $query->get()->getResultArray();
        return $result;
    }
}
