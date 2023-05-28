<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $users;

    public function __construct()
    {
        $this->users = new UsersModel();

        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        return view('auth/register', $this->data);
    }

    public function process()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[16]',
                'errors' => [
                    'required' => 'Username is required',
                    'min_length' => 'Username must be at least 4 characters',
                    'max_length' => 'Username cannot exceed 16 characters',
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'is_unique' => 'Email already registered',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 4 characters',
                    'max_length' => 'Password cannot exceed 50 characters',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            $this->users->insert([
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ]);
            return redirect()->to('/login');
        }
    }
}
