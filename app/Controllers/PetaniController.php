<?php

namespace App\Controllers;

use App\Models\PetaniModel;
use App\Models\KelompokTaniModel;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Database\Exceptions\DatabaseException;
use Error;

class PetaniController extends BaseController
{
    protected $request;
    protected $session;
    protected $petaniModel;
    protected $kelompokTaniModel;
    protected $db;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
        $this->petaniModel = new PetaniModel();
        $this->kelompokTaniModel = new KelompokTaniModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['petani'] = $this->petaniModel->select('tb_petani.*')->join('users', 'users.id = tb_petani.id_user')->where('users.active', '1')->findAll();
        $data['title'] = 'Petani';
        return view('petani/index', $data);
    }

    public function indexUpApproved()
    {
        $data['petani'] = $this->petaniModel->select('tb_petani.*, users.*')->join('users', 'users.id = tb_petani.id_user')->where('users.active', '0')->findAll();
        $data['title'] = 'Petani';
        return view('petani/listUnActive', $data);
    }

    public function tambah()
    {
        $data["kemlompok_tani"] = $this->kelompokTaniModel->findAll();
        $data['title'] = 'Tambah Petani';

        return view('petani/tambah', $data);
    }

    public function tambahShield()
    {
        $data['title'] = 'Tambah Petani';
        return view('petani/register', $data);
    }

    public function simpan()
    {
        $model = new PetaniModel();

        $data = [
            'alamat' => $this->request->getPost('alamat'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'handphone' => $this->request->getPost('handphone'),
            'nik' => $this->request->getPost('nik')
        ];

        if ($model->insert($data)) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan data.');
        }

        return redirect()->to('/petani');
    }

    public function simpanShield()
    {
        $currentUser = auth()->user();
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

            // Add to default group
            // $users->addToDefaultGroup($user);
            $user->addGroup('petani');

            if ($currentUser->inGroup('superadmin', 'admin', 'user')) {
                $user->activate();
            }

            $model = new PetaniModel();

            $data = [
                'alamat' => $this->request->getPost('alamat'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'handphone' => $this->request->getPost('handphone'),
                'nik' => $this->request->getPost('nik'),
                'id_user' => $user->id,
                'id_kelompok_tani' => $this->request->getPost('id_kelompok_tani')
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

        return redirect()->to('/petani');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Petani';
        $data['petani'] = $this->petaniModel->find($id);
        $data["kemlompok_tani"] = $this->kelompokTaniModel->findAll();

        // Get the User Provider (UserModel by default)
        $users = auth()->getProvider();
        $user = $users->findById($data['petani']["id_user"]);
        $userData = $user->toArray();
        $email = $user->getEmail();
        $userData['email'] = $email;
        $data['user'] = $userData;

        return view('petani/edit', $data);
    }

    public function update($id)
    {
        $model = new PetaniModel();

        try {
            $this->db->transException(true)->transStart();

            $data = [
                'alamat' => $this->request->getPost('alamat'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'handphone' => $this->request->getPost('handphone'),
                'nik' => $this->request->getPost('nik'),
                'id_kelompok_tani' => $this->request->getPost('id_kelompok_tani')
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

        return redirect()->to('/petani');
    }

    public function delete($id)
    {
        $model = new PetaniModel();

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

        return redirect()->to('/petani');
    }

    public function tolak($id)
    {
        $model = new PetaniModel();

        try {
            $this->db->transException(true)->transStart();

            $user = $model->find($id);
            $users = auth()->getProvider();

            $users->delete($user["id_user"], true);
            $model->delete($id);

            session()->setFlashdata('success', 'Pendaftaran telah ditolak.');

            $this->db->transComplete();
        } catch (DatabaseException $e) {
            session()->setFlashdata('error', 'Petani gagal di tolak.');
        }

        return redirect()->to('/petani/persetujuan');
    }

    public function setujui($id)
    {
        $model = new PetaniModel();
        $user = $model->find($id);

        auth()->getProvider()->findById($user["id_user"])->activate();
        session()->setFlashdata('success', 'Pendaftaran telah disetujui.');

        return redirect()->to('/petani/persetujuan');
    }
}
