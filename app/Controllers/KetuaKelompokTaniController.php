<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Error;
use App\Models\KetuaKelompokTaniModel;

class KetuaKelompokTaniController extends BaseController
{
    protected $request;
    protected $session;
    protected $db;
    protected $ketuaKelompokTaniModel;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->db = \Config\Database::connect();
        $this->ketuaKelompokTaniModel = new KetuaKelompokTaniModel();
    }

    public function index()
    {
        $data['petani'] = $this->ketuaKelompokTaniModel->select('tb_ketua_kelompok_tani.*')->join('users', 'users.id = tb_ketua_kelompok_tani.id_user')->where('users.active', '1')->findAll();
        $data['title'] = 'Ketua Kelompok Tani';
        return view('ketua_kelompok_tani/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Ketua Kelompok Tani';

        return view('ketua_kelompok_tani/tambah', $data);
    }

    public function simpan()
    {
        try {
            $this->db->transException(true)->transStart();

            // Get the User Provider (UserModel by default)
            $users = auth()->getProvider();

            $user = new User([
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
            ]);
            $users->save($user);

            // To get the complete user object with ID, we need to get from the database
            $user = $users->findById($users->getInsertID());
            $user->activate();

            // Add to default group
            // $users->addToDefaultGroup($user);
            $user->addGroup('ketua');

            $model = new KetuaKelompokTaniModel();

            $data = [
                'alamat' => $this->request->getPost('alamat'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'handphone' => $this->request->getPost('handphone'),
                'nik' => $this->request->getPost('nik'),
                'id_user' => $user->id
            ];

            if ($model->insert($data)) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan.');
            } else {
                session()->setFlashdata('error', 'Gagal menambahkan data.');
            }
            $this->db->transComplete();
        } catch (DatabaseException $e) {
            throw new Error($e->getMessage());
        }

        return redirect()->to('/ketuaKelompokTani');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Ketua Kelompok Tani';
        $data['petani'] = $this->ketuaKelompokTaniModel->find($id);

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();
        $user = $users->findById($data['petani']["id_user"]);
        $userData = $user->toArray();
        $email = $user->getEmail();
        $userData['email'] = $email;
        $data['user'] = $userData;

        return view('ketua_kelompok_tani/edit', $data);
    }

    public function update($id)
    {
        $model = new KetuaKelompokTaniModel();

        try {
            $this->db->transException(true)->transStart();

            $data = [
                'alamat' => $this->request->getPost('alamat'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'handphone' => $this->request->getPost('handphone'),
                'nik' => $this->request->getPost('nik')
            ];

            if ($model->update($id, $data)) {
                session()->setFlashdata('success', 'Data berhasil diperbarui.');

                // Get the User Provider (UserModel by default)
                $users = auth()->getProvider();

                $user = $users->findById($this->request->getPost('id_user'));

                $userSecrets = [
                    'username' => $this->request->getPost('username'),
                    'email' => $this->request->getPost('email'),
                ];

                if ($this->request->getPost('password')) {
                    $userSecrets['password'] = $this->request->getPost('password');
                }

                $user->fill($userSecrets);
                $users->save($user);
            } else {
                session()->setFlashdata('error', 'Gagal memperbarui data.');

                throw new Error('Gagal memperbarui data.');
            }

            $this->db->transComplete();
        } catch (DatabaseException $e) {
            throw new Error($e->getMessage());
        }

        return redirect()->to('/ketuaKelompokTani');
    }

    public function delete($id)
    {
        $model = new KetuaKelompokTaniModel();

        try {
            $this->db->transException(true)->transStart();

            $user = $model->find($id);
            $users = auth()->getProvider();

            $users->delete($user["id_user"], true);
            $model->delete($id);

            session()->setFlashdata('success', 'Data berhasil dihapus.');

            $this->db->transComplete();
        } catch (DatabaseException $e) {
            session()->setFlashdata('error', 'Gagal menghapus data.');
        }

        return redirect()->to('/ketuaKelompokTani');
    }
}
