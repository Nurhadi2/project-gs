<?php

namespace App\Controllers;

use App\Models\KoordinatKecamatanModel;
use App\Models\KecamatanModel;

class KecamatanController extends BaseController
{
    protected $request;
    protected $session;
    protected $kecamatanModel;
    protected $koordinatKecamatanModel;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->kecamatanModel = new KecamatanModel();
        $this->koordinatKecamatanModel = new KoordinatKecamatanModel();
    }

    public function index()
    {
        $data['kecamatan'] = $this->kecamatanModel->findAll();
        $data['title'] = 'Kecamatan';
        return view('kecamatan/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kecamatan';

        return view('kecamatan/tambah', $data);
    }

    public function simpan()
    {
        $model = new KecamatanModel();

        $data = [
            'nama_kecamatan' => $this->request->getPost('nama_kecamatan')
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/kecamatan');
    }

    public function edit($id)
    {

        $data['title'] = 'Edit Kecamatan';
        $data['kecamatan'] = $this->kecamatanModel->find($id);

        return view('kecamatan/edit', $data);
    }

    public function update($id)
    {
        $model = new KecamatanModel();

        $data = [
            'nama_kecamatan' => $this->request->getPost('nama_kecamatan'),
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
        }

        return redirect()->to('/kecamatan');
    }

    public function delete($id)
    {
        $model = new KecamatanModel();

        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data.');
        }

        return redirect()->to('/kecamatan');
    }

    public function detail($id)
    {
        $koordinatKecamatanModel = new KoordinatKecamatanModel();

        $data['kecamatan'] = $this->kecamatanModel->find($id);
        $data['title'] = 'Detail Kecamatan';
        $data['koordinat_kecamatan'] = $koordinatKecamatanModel->where('id_kecamatan', $id)->findAll();

        return view('kecamatan/detail', $data);
    }

    public function getAllKecamatanAjax()
    {
        $model = new KecamatanModel();
        $data = $model->getDataForLandingPage();
        return $this->response->setJSON($data);
    }
}
