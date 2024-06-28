<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new User();
        $data['users'] = $userModel->findAll();

        return view('user/main', $data);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'full_name' => 'required',
            'username'  => 'required|is_unique[users.username]',
            'password'  => 'required|min_length[8]',
            'retype_password' => 'required|matches[password]'
        ]);

        if (!$validation) {
            return view('user/create', ['validation' => $this->validator]);
        }

        $userModel = new User();
        $userModel->insertUser($this->request->getPost());

        return redirect()->route('user')->with('message', 'User created successfully');
    }

    public function edit($id)
    {
        $userModel = new User();
        $data['user'] = $userModel->find($id);

        return view('user/edit', $data);
    }

    public function update($id)
    {
        $userModel = new User();
        $user = $userModel->find($id);

        $validation = $this->validate([
            'full_name' => 'required',
            'old_password' => 'required',
            'password' => 'required|min_length[8]',
            'retype_password' => 'required|matches[password]'
        ]);

        if (!$validation) {
            return view('user/edit', ['validation' => $this->validator, 'user' => $user]);
        }

        if (!password_verify($this->request->getPost('old_password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Old password does not match');
        }

        if ($this->request->getPost('status') == 'active') {
            $status = 1;
        } else {
            $status = 0;
        }

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'is_active' => $status
        ];

        $userModel->update($id, $data);

        return redirect()->route('user')->with('message', 'User updated successfully');
    }


    public function delete($id)
    {
        $userModel = new User();
        $userModel->delete($id);

        return redirect()->route('user')->with('message', 'User deleted successfully');
    }
}
