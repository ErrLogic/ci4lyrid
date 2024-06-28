<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $session = session();
        $model = new User();
        $data = $model->where('username', $username)->first();

        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if($authenticatePassword){
                $sessionData = [
                    'id'            => $data['id'],
                    'username'      => $data['username'],
                    'full_name'     => $data['full_name'],
                    'is_login'      => TRUE
                ];

                $session->set($sessionData);
                return redirect()->route('dashboard');
            }
        }

        $session->setFlashdata('msg', 'Credentials missmatch');

        return redirect()->route('login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->route('login');
    }
}
