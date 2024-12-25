<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransaksiPanenModel;
use App\Models\LahanModel;

class TransaksiPanenController extends BaseController
{
    protected $transaksiPanenModel;
    protected $lahanModel;
    protected $db;

    public function __construct()
    {
        $this->transaksiPanenModel = new TransaksiPanenModel();
        $this->lahanModel = new LahanModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Transaksi Panen',
            'transaksi_panen' => $this->transaksiPanenModel->select('tb_transaksi_panen.*, tb_lahan.luas, tb_lahan.lokasi, tb_kecamatan.nama_kecamatan, tb_bulan.month_name')->join('tb_lahan', 'tb_lahan.id_lahan = tb_transaksi_panen.id_lahan', 'left')->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left')->join('tb_kelompok_tani', 'tb_kelompok_tani.id_kelompok_tani = tb_petani.id_kelompok_tani', 'left')->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan', 'left')->join('tb_bulan', 'tb_bulan.id_month = tb_transaksi_panen.bulan', 'left')->findAll(),
        ];

        return view('transaksi_panen/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Transaksi Panen',
            'lahan' => $this->lahanModel->select('tb_lahan.id_lahan, tb_lahan.luas, tb_lahan.lokasi, tb_petani.nama_lengkap')->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left')->findAll(),
        ];

        $data['months'] = $this->db->query("SELECT * FROM tb_bulan")->getResultArray();

        return view('transaksi_panen/tambah', $data);
    }

    public function simpan()
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'tahun' => $this->request->getPost('tahun'),
            'total_area' => $this->request->getPost('total_area'),
            'produksi' => $this->request->getPost('produksi'),
            'id_lahan' => $this->request->getPost('id_lahan'),
        ];

        $this->transaksiPanenModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/transaksiPanen');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Transaksi Panen',
            'transaksi_panen' => $this->transaksiPanenModel->where('id_transaksi_panen', $id)->first(),
            'lahan' => $this->lahanModel->select('tb_lahan.id_lahan, tb_lahan.luas, tb_lahan.lokasi, tb_petani.nama_lengkap')->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left')->findAll(),
        ];

        $data['months'] = $this->db->query("SELECT * FROM tb_bulan")->getResultArray();

        return view('transaksi_panen/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'tahun' => $this->request->getPost('tahun'),
            'total_area' => $this->request->getPost('total_area'),
            'produksi' => $this->request->getPost('produksi'),
            'id_lahan' => $this->request->getPost('id_lahan'),
        ];

        $this->transaksiPanenModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/transaksiPanen');
    }

    public function delete($id)
    {
        $this->transaksiPanenModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/transaksiPanen');
    }
}
