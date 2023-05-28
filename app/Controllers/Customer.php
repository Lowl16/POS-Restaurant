<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Customer extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $customer_model;

    public function __construct(){
        $this->customer_model = new UsersModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Customer";
        $this->data['activeMenu'] = "customer";

        $this->data['list'] = $this->customer_model->select('*')->where('role', 'customer')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/customer', $this->data);
        echo view('admin/footer');
    }
    
    public function create(){
        $this->data['title'] = "Add Customer";
        $this->data['activeMenu'] = "customer";
        $this->data['request'] = $this->request;

        echo view('admin/header', $this->data);
        echo view('admin/createcustomer', $this->data);
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
            $role = 'customer';
            $this->customer_model->insert([
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => $role
            ]);
            return redirect()->to('/customer');
        }
    }

    public function save(){
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Customer";
        $this->data['activeMenu'] = "customer";
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
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email is required',
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
            $role = 'customer';
            $post = [
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role' => $role
            ];
            if(!empty($this->request->getPost('id')))
                $save = $this->customer_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
            else
                $save = $this->customer_model->insert($post);
            if($save){
                if(!empty($this->request->getPost('id')))
                $this->session->setFlashdata('success_message','Data has been updated successfully') ;
                else
                $this->session->setFlashdata('success_message','Data has been added successfully') ;
                $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
                return redirect()->to('/customer/index');
            }else{
                echo view('admin/header', $this->data);
                echo view('admin/createcustomer', $this->data);
                echo view('admin/footer');
            }
        }
    }

    public function edit($id=''){
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Customer";
        $this->data['activeMenu'] = "customer";
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/customer/index');
        }
        $query= $this->customer_model->select('*')->where(['id'=>$id]);
        $this->data['data'] = $query->first();
        echo view('admin/header', $this->data);
        echo view('admin/editcustomer', $this->data);
        echo view('admin/footer');
    }

    public function delete($id=''){
        
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/customer/index');
        }
        $delete = $this->customer_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Customer Details has been deleted successfully.') ;
            return redirect()->to('/customer/index');
        }
    }
}