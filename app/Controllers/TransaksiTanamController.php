<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TransaksiTanamModel;
use App\Models\LahanModel;

class TransaksiTanamController extends BaseController
{
    protected $transaksiTanamModel;
    protected $lahanModel;
    protected $db;

    public function __construct()
    {
        $this->transaksiTanamModel = new TransaksiTanamModel();
        $this->lahanModel = new LahanModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Transaksi Tanam',
            'transaksi_tanam' => $this->transaksiTanamModel->select('tb_transaksi_tanam.*, tb_lahan.luas, tb_lahan.lokasi, tb_kecamatan.nama_kecamatan, tb_bulan.month_name')->join('tb_lahan', 'tb_lahan.id_lahan = tb_transaksi_tanam.id_lahan', 'left')->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left')->join('tb_kelompok_tani', 'tb_kelompok_tani.id_kelompok_tani = tb_petani.id_kelompok_tani', 'left')->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan', 'left')->join('tb_bulan', 'tb_bulan.id_month = tb_transaksi_tanam.bulan', 'left')->findAll(),
        ];

        return view('transaksi_tanam/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Transaksi Tanam',
            'lahan' => $this->lahanModel->select('tb_lahan.id_lahan, tb_lahan.luas, tb_lahan.lokasi, tb_petani.nama_lengkap')->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left')->findAll(),
        ];

        $data['months'] = $this->db->query("SELECT * FROM tb_bulan")->getResultArray();

        return view('transaksi_tanam/tambah', $data);
    }

    public function simpan()
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'tahun' => $this->request->getPost('tahun'),
            'total_area' => $this->request->getPost('total_area'),
            'urea' => $this->request->getPost('urea'),
            'id_lahan' => $this->request->getPost('id_lahan'),
        ];

        $this->transaksiTanamModel->insert($data);
        session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        return redirect()->to('/transaksiTanam');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Transaksi Tanam',
            'transaksi_tanam' => $this->transaksiTanamModel->where('id_transaksi_tanam', $id)->first(),
            'lahan' => $this->lahanModel->select('tb_lahan.id_lahan, tb_lahan.luas, tb_lahan.lokasi, tb_petani.nama_lengkap')->join('tb_petani', 'tb_petani.id_petani = tb_lahan.id_petani', 'left')->findAll(),
        ];

        $data['months'] = $this->db->query("SELECT * FROM tb_bulan")->getResultArray();

        // dd($data);

        return view('transaksi_tanam/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'bulan' => $this->request->getPost('bulan'),
            'tahun' => $this->request->getPost('tahun'),
            'total_area' => $this->request->getPost('total_area'),
            'urea' => $this->request->getPost('urea'),
            'id_lahan' => $this->request->getPost('id_lahan'),
        ];

        $this->transaksiTanamModel->update($id, $data);
        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/transaksiTanam');
    }

    public function delete($id)
    {
        $this->transaksiTanamModel->delete($id);
        session()->setFlashdata('success', 'Data berhasil dihapus.');
        return redirect()->to('/transaksiTanam');
    }
}
