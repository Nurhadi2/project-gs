<?php

namespace App\Controllers;

use App\Models\KomoditasModel;
use App\Models\LahanModel;

class Home extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->komoditasModel = new KomoditasModel();
        $this->lahanModel = new LahanModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['komoditas'] = $this->komoditasModel->findAll();

        $dataProduktivitas = $this->db->query("SELECT
                tb_kecamatan.id_kecamatan,
                tb_kecamatan.nama_kecamatan,
                SUM(tb_transaksi_tanam.urea) AS productivitas 
            FROM
                tb_transaksi_tanam
                LEFT JOIN tb_lahan ON tb_transaksi_tanam.id_lahan = tb_lahan.id_lahan
                LEFT JOIN tb_petani ON tb_lahan.id_petani = tb_petani.id_petani
                LEFT JOIN tb_kelompok_tani ON tb_petani.id_kelompok_tani = tb_kelompok_tani.id_kelompok_tani
                LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan
            WHERE tb_transaksi_tanam.bulan = MONTH(CURRENT_DATE)
            GROUP BY tb_kecamatan.id_kecamatan;")->getResultArray();

        $dataProduksi = $this->db->query("SELECT
                tb_kecamatan.id_kecamatan,
                tb_kecamatan.nama_kecamatan,
                SUM(tb_transaksi_panen.produksi) AS produksi 
            FROM
                tb_transaksi_panen
                LEFT JOIN tb_lahan ON tb_transaksi_panen.id_lahan = tb_lahan.id_lahan
                LEFT JOIN tb_petani ON tb_lahan.id_petani = tb_petani.id_petani
                LEFT JOIN tb_kelompok_tani ON tb_petani.id_kelompok_tani = tb_kelompok_tani.id_kelompok_tani
                LEFT JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan
            WHERE tb_transaksi_panen.bulan = MONTH(CURRENT_DATE)
            GROUP BY tb_kecamatan.id_kecamatan;")->getResultArray();

        $namaKecamatanTanam = array_map(function ($item) {
            return $item['nama_kecamatan'];
        }, $dataProduktivitas);
        $namaKecamatanPanen = array_map(function ($item) {
            return $item['nama_kecamatan'];
        }, $dataProduksi);
        $produksi = array_map(function ($item) {
            return $item['produksi'];
        }, $dataProduksi);
        $productivitas = array_map(function ($item) {
            return $item['productivitas'];
        }, $dataProduktivitas);

        $data = array(
            "komoditas" => $this->komoditasModel->findAll(),
            'namaKecamatanTanam' => $namaKecamatanTanam,
            'namaKecamatanPanen' => $namaKecamatanPanen,
            'produksi' => $produksi,
            'productivitas' => $productivitas,
        );

        return view('landing_page', $data);
    }

    public function specificIndex()
    {
        $idKomoditas = $this->request->getVar('id_komoditas');
        $keyword = $this->request->getVar('keyword');

        return view('landing_page');
    }
}
