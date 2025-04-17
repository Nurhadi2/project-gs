<?php

namespace App\Controllers;

use App\Models\KoordinatKecamatanModel;

class KoordinatKecamatanController extends BaseController
{
    protected $request;
    protected $session;
    protected $koordinatModel;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->koordinatModel = new KoordinatKecamatanModel();
    }

    public function saveAjax()
    {
        $coordinates = $this->request->getPost('coordinates');

        for ($index = 0; $index < count($coordinates); $index++) {
            $data = array(
                'latitude' => $coordinates[$index][0],
                'longitude' => $coordinates[$index][1],
                'id_kecamatan' => $this->request->getPost('id_kecamatan')
            );
            $this->koordinatModel->save($data);
        }

        return $this->response->setJSON($data);
    }

    public function edit($id)
    {
        $data["title"] = "Koordinat Kecamatan";
        $data['koordinat_kecamatan'] = $this->koordinatModel->find($id);

        return view('koordinat_kecamatan/edit', $data);
    }

    public function update($id, $id_kecamatan)
    {
        $data = [
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
        ];

        if ($this->koordinatModel->update($id, $data)) {
            session()->setFlashdata('success', 'Data berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui data.');
        }

        return redirect()->to('/kecamatan/detail/' . $id_kecamatan);
    }

    public function deleteByIdLahan($idLahan)
    {
        if ($this->koordinatModel->where('id_kecamatan', $idLahan)->delete()) {
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data.');
        }

        return redirect()->to('/kecamatan/detail/' . $idLahan);
    }

    public function getKoordinatKecamatanAjax()
    {
        $idLahan = $this->request->getPost('id_kecamatan');
        $data = $this->koordinatModel->where('id_kecamatan', $idLahan)->findAll();
        $polygon = array();

        foreach ($data as $key => $value) {
            $polygon[] = array($value['latitude'], $value['longitude']);
        }

        return $this->response->setJSON($polygon);
    }
}
