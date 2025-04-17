<?php

namespace App\Models;

use CodeIgniter\Model;

class LahanModel extends Model
{
    protected $table      = 'tb_lahan';
    protected $primaryKey = 'id_lahan';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'jenis',
        'status_kepemilikan',
        'total_penghasilan',
        'lokasi',
        'luas',
        'id_petani'
    ];

    public function getDataForLandingPage($keyword, $id_komoditas)
    {
        $query = $this->db->table($this->table);
        $query->select('tb_lahan.id_lahan, tb_petani.nama_lengkap, tb_petani.nik, tb_petani.handphone, tb_lahan.jenis, tb_lahan.status_kepemilikan, tb_lahan.total_penghasilan, tb_lahan.lokasi, tb_lahan.luas, tb_komoditas.nama_komoditas, tb_jenis_kepemilikan.nama_jenis_kepemilikan');
        $query->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left');
        $query->join('tb_komoditas', 'tb_komoditas.id_komoditas = tb_lahan.jenis', 'left');
        $query->join('tb_jenis_kepemilikan', 'tb_jenis_kepemilikan.id_jenis_kepemilikan = tb_lahan.status_kepemilikan', 'left');

        if ($keyword != "all") {
            $query->like('tb_petani.nama_lengkap', $keyword);
        }

        if ($id_komoditas != '0') {
            $query->where('tb_lahan.jenis', $id_komoditas);
        }

        $result = $query->get()->getResultArray();

        return $result;
    }

    public function findAllWithRelation()
    {
        $query = $this->db->table($this->table);
        $query->select('tb_lahan.id_lahan, tb_petani.nama_lengkap, tb_petani.nik, tb_petani.handphone, tb_lahan.jenis, tb_lahan.status_kepemilikan, tb_lahan.total_penghasilan, tb_lahan.lokasi, tb_lahan.luas, tb_komoditas.nama_komoditas, tb_jenis_kepemilikan.nama_jenis_kepemilikan');
        $query->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left');
        $query->join('tb_komoditas', 'tb_komoditas.id_komoditas = tb_lahan.jenis', 'left');
        $query->join('tb_jenis_kepemilikan', 'tb_jenis_kepemilikan.id_jenis_kepemilikan = tb_lahan.status_kepemilikan', 'left');
        $result = $query->get()->getResultArray();

        return $result;
    }
}
