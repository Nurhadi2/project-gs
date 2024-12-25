<?php

namespace App\Controllers;

use App\Models\JenisKepemilikanModel;

class JenisKepemilikanController extends BaseController
{
    protected $komoditasModel;

    public function __construct()
    {
        $this->komoditasModel = new JenisKepemilikanModel();
    }

    // List all commodities
    public function index()
    {
        $data['jenisKepemilikan'] = $this->komoditasModel->findAll();
        $data['title'] = 'Jenis Kepemilikan';
        return view('jenis_kepemilikan/index', $data);
    }

    // Form to add a new commodity
    public function tambah()
    {
        $data['title'] = 'Jenis Kepemilikan';
        return view('jenis_kepemilikan/tambah', $data);
    }

    // Save a new commodity
    public function simpan()
    {
        $this->komoditasModel->save([
            'nama_jenis_kepemilikan' => $this->request->getPost('nama_jenis_kepemilikan')
        ]);

        return redirect()->to('/jenisKepemilikan')->with('success', 'JenisKepemilikan berhasil ditambahkan');
    }

    // Form to edit commodity
    public function edit($id)
    {
        $data['title'] = 'Jenis Kepemilikan';
        $data['jenisKepemilikan'] = $this->komoditasModel->find($id);
        return view('jenis_kepemilikan/edit', $data);
    }

    // Update a commodity
    public function update($id)
    {
        $this->komoditasModel->update($id, [
            'nama_jenis_kepemilikan' => $this->request->getPost('nama_jenis_kepemilikan')
        ]);

        return redirect()->to('/jenisKepemilikan')->with('success', 'JenisKepemilikan berhasil diupdate');
    }

    // Delete a commodity
    public function hapus($id)
    {
        $this->komoditasModel->delete($id);
        return redirect()->to('/jenisKepemilikan')->with('success', 'JenisKepemilikan berhasil dihapus');
    }
}
