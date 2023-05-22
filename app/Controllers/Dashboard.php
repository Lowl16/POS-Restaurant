<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Dashboard extends BaseController
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
        $this->data['title'] = "Dashboard";
        $this->data['activeMenu'] = "dashboard";
        $this->data['customerRowCount'] = $this->customer_model->where('role', 'customer')->countAllResults();

        echo view('admin/header', $this->data);
        echo view('admin/dashboard', $this->data);
        echo view('admin/footer');
    }   
}