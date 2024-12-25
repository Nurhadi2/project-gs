<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    protected $db;
    function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index(): string
    {
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
            'title' => 'Dashboard',
            'namaKecamatanTanam' => $namaKecamatanTanam,
            'namaKecamatanPanen' => $namaKecamatanPanen,
            'produksi' => $produksi,
            'productivitas' => $productivitas
        );

        return view('dashboard/dashboard_page', $data);
    }

    public function coba(): string
    {
        return view('coba/coba');
    }
}
