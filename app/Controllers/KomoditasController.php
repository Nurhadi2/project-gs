<?php

namespace App\Controllers;

use App\Models\KomoditasModel;
use App\Models\JenisKomoditasModel;

class KomoditasController extends BaseController
{
    protected $komoditasModel;
    protected $jenisKomoditasModel;

    public function __construct()
    {
        $this->komoditasModel = new KomoditasModel();
        $this->jenisKomoditasModel = new JenisKomoditasModel();
    }

    // List all commodities
    public function index()
    {
        $data['komoditas'] = $this->komoditasModel->select('tb_komoditas.id_komoditas, tb_komoditas.nama_komoditas, tb_jenis_komoditas.name_jenis_komoditas, tb_komoditas.id_kategori')->join('tb_jenis_komoditas', 'tb_jenis_komoditas.id_jenis_komoditas = tb_komoditas.id_kategori', 'left')->findAll();

        $data['title'] = 'Komoditas';
        return view('komoditas/index', $data);
    }

    // Form to add a new commodity
    public function tambah()
    {
        $data['title'] = 'Komoditas';
        $data['jenis_komoditas'] = $this->jenisKomoditasModel->findAll();
        return view('komoditas/tambah', $data);
    }

    // Save a new commodity
    public function simpan()
    {
        $data = array(
            'nama_komoditas' => $this->request->getPost('nama_komoditas'),
            'id_kategori' => $this->request->getPost('id_jenis_komoditas')
        );

        $this->komoditasModel->save($data);

        return redirect()->to('/komoditas')->with('success', 'Komoditas berhasil ditambahkan');
    }

    // Form to edit commodity
    public function edit($id)
    {
        $data['title'] = 'Komoditas';
        $data['komoditas'] = $this->komoditasModel->find($id);
        return view('komoditas/edit', $data);
    }

    // Update a commodity
    public function update($id)
    {
        $this->komoditasModel->update($id, [
            'nama_komoditas' => $this->request->getPost('nama_komoditas')
        ]);

        return redirect()->to('/komoditas')->with('success', 'Komoditas berhasil diupdate');
    }

    // Delete a commodity
    public function hapus($id)
    {
        $this->komoditasModel->delete($id);
        return redirect()->to('/komoditas')->with('success', 'Komoditas berhasil dihapus');
    }
}
