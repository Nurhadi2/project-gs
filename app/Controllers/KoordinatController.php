<?php

namespace App\Controllers;

use App\Models\KoordinatModel;

class KoordinatController extends BaseController
{
    protected $request;
    protected $session;
    protected $koordinatModel;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->koordinatModel = new KoordinatModel();
    }

    public function saveAjax()
    {
        $coordinates = $this->request->getPost('coordinates');

        for ($index = 0; $index < count($coordinates); $index++) {
            $data = array(
                'latitude' => $coordinates[$index][0],
                'longitude' => $coordinates[$index][1],
                'id_lahan' => $this->request->getPost('id_lahan')
            );
            $this->koordinatModel->save($data);
        }

        return $this->response->setJSON($data);
    }

    public function edit($id)
    {
        $data["title"] = "Koordinat";
        $data['koordinat'] = $this->koordinatModel->find($id);

        return view('koordinat/edit', $data);
    }

    public function update($id, $id_lahan)
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

        return redirect()->to('/lahan/detail/' . $id_lahan);
    }

    public function deleteByIdLahan($idLahan)
    {
        if ($this->koordinatModel->where('id_lahan', $idLahan)->delete()) {
            session()->setFlashdata('success', 'Data berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data.');
        }

        return redirect()->to('/lahan/detail/' . $idLahan);
    }

    public function getKoordinatLahanAjax()
    {
        $idLahan = $this->request->getPost('id_lahan');
        $data = $this->koordinatModel->where('id_lahan', $idLahan)->findAll();
        $polygon = array();

        foreach ($data as $key => $value) {
            $polygon[] = array($value['latitude'], $value['longitude']);
        }

        return $this->response->setJSON($polygon);
    }

    public function dashboard()
    {
        return redirect()->to('/dashboard');
    }
}
