<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Cashier extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $cashier_model;

    public function __construct(){
        $this->cashier_model = new UsersModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Cashier";
        $this->data['activeMenu'] = "cashier";

        $this->data['list'] = $this->cashier_model->select('*')->where('role', 'cashier')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/cashier', $this->data);
        echo view('admin/footer');
    }
    
    public function create(){
        $this->data['title'] = "Add Cashier";
        $this->data['activeMenu'] = "cashier";
        $this->data['request'] = $this->request;

        echo view('admin/header', $this->data);
        echo view('admin/createcashier', $this->data);
        echo view('admin/footer');
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
            $role = 'cashier';
            $this->cashier_model->insert([
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => $role
            ]);
            return redirect()->to('/cashier');
        }
    }

    public function save(){
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Cashier";
        $this->data['activeMenu'] = "cashier";
        $role = 'cashier';
        $post = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role' => $role
        ];
        if(!empty($this->request->getPost('id')))
            $save = $this->cashier_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->cashier_model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/cashier/index');
        }else{
            echo view('admin/header', $this->data);
            echo view('admin/createcashier', $this->data);
            echo view('admin/footer');
        }
    }

    public function edit($id=''){
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Cashier";
        $this->data['activeMenu'] = "cashier";
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/cashier/index');
        }
        $query= $this->cashier_model->select('*')->where(['id'=>$id]);
        $this->data['data'] = $query->first();
        echo view('admin/header', $this->data);
        echo view('admin/editcashier', $this->data);
        echo view('admin/footer');
    }

    public function delete($id=''){
        
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/cashier/index');
        }
        $delete = $this->cashier_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Customer Details has been deleted successfully.') ;
            return redirect()->to('/cashier/index');
        }
    }
}