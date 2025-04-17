<?php

namespace App\Controllers;

use App\Models\LahanModel;
use App\Models\PetaniModel;
use App\Models\KoordinatModel;
use App\Models\KomoditasModel;
use App\Models\JenisKepemilikanModel;

class LahanController extends BaseController
{
    protected $request;
    protected $session;
    protected $lahanModel;
    protected $koordinatModel;
    protected $komoditasModel;
    protected $jenisKepemilikanModel;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->lahanModel = new LahanModel();
        $this->koordinatModel = new KoordinatModel();
        $this->komoditasModel = new KomoditasModel();
        $this->jenisKepemilikanModel = new JenisKepemilikanModel();
    }

    public function index()
    {
        $data['lahan'] = $this->lahanModel->findAllWithRelation();
        $data['title'] = 'Lahan';
        return view('lahan/index', $data);
    }

    public function tambah()
    {
        $petaniModel = new PetaniModel();

        $data['petani'] = $petaniModel->findAll();
        $data['komoditas'] = $this->komoditasModel->findAll();
        $data['jenisKepemilikan'] = $this->jenisKepemilikanModel->findAll();
        $data['title'] = 'Tambah Lahan';

        return view('lahan/tambah', $data);
    }

    public function simpan()
    {
        $model = new LahanModel();

        $data = [
            'jenis' => $this->request->getPost('id_komoditas'),
            'status_kepemilikan' => $this->request->getPost('id_jenis_kepemilikan'),
            'total_penghasilan' => $this->request->getPost('total_penghasilan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'luas' => $this->request->getPost('luas'),
            'id_petani' => $this->request->getPost('id_petani'),
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/lahan');
    }

    public function edit($id)
    {
        $petaniModel = new PetaniModel();

        $data['title'] = 'Edit Lahan';
        $data['petani'] = $petaniModel->findAll();
        $data['komoditas'] = $this->komoditasModel->findAll();
        $data['jenisKepemilikan'] = $this->jenisKepemilikanModel->findAll();
        $data['lahan'] = $this->lahanModel->find($id);

        return view('lahan/edit', $data);
    }

    public function update($id)
    {
        $model = new LahanModel();

        $data = [
            'jenis' => $this->request->getPost('id_komoditas'),
            'status_kepemilikan' => $this->request->getPost('id_jenis_kepemilikan'),
            'total_penghasilan' => $this->request->getPost('total_penghasilan'),
            'lokasi' => $this->request->getPost('lokasi'),
            'luas' => $this->request->getPost('luas'),
            'id_petani' => $this->request->getPost('id_petani'),
        ];

        if ($model->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
        }

        return redirect()->to('/lahan');
    }

    public function delete($id)
    {
        $model = new LahanModel();

        if ($model->delete($id)) {
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data.');
        }

        return redirect()->to('/lahan');
    }

    public function detail($id)
    {
        $petaniModel = new PetaniModel();
        $koordinatModel = new KoordinatModel();

        $data['lahan'] = $this->lahanModel->find($id);
        $data['title'] = 'Detail Lahan';
        $data['petani'] = $petaniModel->findAll();
        $data['koordinat'] = $koordinatModel->where('id_lahan', $id)->findAll();

        return view('lahan/detail', $data);
    }

    public function getAllLahanAjax()
    {
        $model = new LahanModel();

        $keyword = $this->request->getPost('keyword');
        $id_komoditas = $this->request->getPost('id_komoditas');

        $data["data"] = $model->getDataForLandingPage($keyword, $id_komoditas);
        return $this->response->setJSON($data);
    }
}
