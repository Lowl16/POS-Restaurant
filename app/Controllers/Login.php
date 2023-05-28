<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
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
        return view('auth/login', $this->data);
    }

    public function process(){
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $dataUser = $this->users->where(['email' => $email])->first();
        if ($dataUser) {
            $password_check = password_verify($password, $dataUser['password']);
            if ($password_check) {
                session()->set([
                    'username' => $dataUser['username'],
                    'email' => $dataUser['email'],
                    'role' => $dataUser['role'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/');
            } else {        
                session()->setFlashdata('errorpassword', 'Incorrect password');
                session()->setFlashdata('email', $email);
                return redirect()->back()->withInput();
            }
        } else {
            session()->setFlashdata('erroremail', 'Email is not registered');
            session()->setFlashdata('email', $email);
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
