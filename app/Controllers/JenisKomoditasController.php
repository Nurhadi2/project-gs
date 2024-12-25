<?php

namespace App\Controllers;

use App\Models\JenisKomoditasModel;

class JenisKomoditasController extends BaseController
{
    protected $komoditasModel;

    public function __construct()
    {
        $this->komoditasModel = new JenisKomoditasModel();
    }

    // List all commodities
    public function index()
    {
        $data['jenisKomoditas'] = $this->komoditasModel->findAll();
        $data['title'] = 'Jenis Komoditas';
        return view('jenis_komoditas/index', $data);
    }

    // Form to add a new commodity
    public function tambah()
    {
        $data['title'] = 'Jenis Komoditas';
        return view('jenis_komoditas/tambah', $data);
    }

    // Save a new commodity
    public function simpan()
    {
        $this->komoditasModel->save([
            'name_jenis_komoditas' => $this->request->getPost('nama_jenis_komoditas')
        ]);

        return redirect()->to('/jenisKomoditas')->with('success', 'JenisKomoditas berhasil ditambahkan');
    }

    // Form to edit commodity
    public function edit($id)
    {
        $data['title'] = 'Jenis Komoditas';
        $data['jenisKomoditas'] = $this->komoditasModel->find($id);
        return view('jenis_komoditas/edit', $data);
    }

    // Update a commodity
    public function update($id)
    {
        $this->komoditasModel->update($id, [
            'name_jenis_komoditas' => $this->request->getPost('nama_jenis_komoditas')
        ]);

        return redirect()->to('/jenisKomoditas')->with('success', 'JenisKomoditas berhasil diupdate');
    }

    // Delete a commodity
    public function hapus($id)
    {
        $this->komoditasModel->delete($id);
        return redirect()->to('/jenisKomoditas')->with('success', 'JenisKomoditas berhasil dihapus');
    }
}
