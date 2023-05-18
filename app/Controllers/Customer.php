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

    public function save(){
        $this->data['request'] = $this->request;
        $role = 'customer';
        $post = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
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

    public function edit($id=''){
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
}