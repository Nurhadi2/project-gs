<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KecamatanModel;
use App\Models\KelompokTaniModel;
use App\Models\PetaniModel;
use App\Models\KetuaKelompokTaniModel;

class KelompokTaniController extends BaseController
{
    protected $request;
    protected $session;
    protected $kelompokTaniModel;
    protected $kecamatanModel;
    protected $petaniModel;
    protected $ketuaKelompokTaniModel;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->kelompokTaniModel = new KelompokTaniModel();
        $this->ketuaKelompokTaniModel = new KetuaKelompokTaniModel();
        $this->kecamatanModel = new KecamatanModel();
    }

    public function index()
    {
        $data['kelompok_tani'] = $this->kelompokTaniModel->findAllwithRelation();
        $data['title'] = 'Kelompok Tani';
        return view('kelompok_tani/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kelompok Tani';
        $data['kecamatan'] = $this->kecamatanModel->findAll();
        $data['ketua'] = $this->ketuaKelompokTaniModel->select('tb_ketua_kelompok_tani.*')->join('users', 'users.id = tb_ketua_kelompok_tani.id_user')->where('users.active', '1')->findAll();

        return view('kelompok_tani/tambah', $data);
    }

    public function simpan()
    {
        $model = new KelompokTaniModel();

        $data = [
            'id_kecamatan' => $this->request->getPost('id_kecamatan'),
            'nama_kelompok_tani' => $this->request->getPost('nama_kelompok_tani'),
            'nama_ketua' => $this->request->getPost('nama_ketua'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/kelompokTani');
    }

    public function delete($id)
    {
        $model = new KelompokTaniModel();

        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data.');
        }

        return redirect()->to('/kelompokTani');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kelompok Tani';
        $data['kelompok_tani'] = $this->kelompokTaniModel->find($id);
        $data['kecamatan'] = $this->kecamatanModel->findAll();
        $data['ketua'] = $this->ketuaKelompokTaniModel->select('tb_ketua_kelompok_tani.*')->join('users', 'users.id = tb_ketua_kelompok_tani.id_user')->where('users.active', '1')->findAll();

        return view('kelompok_tani/edit', $data);
    }

    public function update($id)
    {
        $model = new KelompokTaniModel();

        $data = [
            'id_kecamatan' => $this->request->getPost('id_kecamatan'),
            'nama_kelompok_tani' => $this->request->getPost('nama_kelompok_tani'),
            'nama_ketua' => $this->request->getPost('nama_ketua'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
        }

        return redirect()->to('/kelompokTani');
    }

    public function detail($id)
    {
        $kelompokTaniModel = new KelompokTaniModel();
        $petaniModel    =  new PetaniModel();

        $data['title'] = 'Detail Kelompok Tani';
        $data['kelompok_tani'] = $kelompokTaniModel->select('tb_kelompok_tani.*, tb_kecamatan.nama_kecamatan')
            ->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kelompok_tani.id_kecamatan')->where('id_kelompok_tani', $id)->first();
        $data["members"] = $petaniModel->select('tb_petani.*')->where('tb_petani.id_kelompok_tani', $id)->findAll();

        return view('kelompok_tani/detail', $data);
    }
}
