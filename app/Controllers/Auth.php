<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login(): string
    {
        return view('login_page');
    }

    public function login_process()
    {
        $session = session();
        $userModel = new UserModel();

        // Get email and password from POST request
        $nip = $this->request->getPost('nip');
        $password = $this->request->getPost('password');

        // Find user by nip
        $user = $userModel->getUserByNIP($nip);

        if ($user && $password == $user['password']) {
            // Password matches, set session data
            $session->set([
                'user_id' => $user['user_id'],
                'nip' => $user['nip'],
                'logged_in' => true
            ]);

            // Redirect to dashboard or another page
            return redirect()->to('/dashboard');
            // return redirect()->to('');
        } else {
            // Invalid credentials, show error message
            $session->setFlashdata('error', 'Invalid nip or password');
            return redirect()->back();
            // return redirect()->to('/');
        }
    }

    public function logout()
    {
        // $session = session();
        // $session->destroy();

        auth()->logout();
        return redirect()->to('/login');
    }
}
