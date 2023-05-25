<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use App\Models\UsersModel;

class Dashboard extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $customer_model;
    protected $product_model;

    public function __construct(){
        $this->customer_model = new UsersModel();
        $this->product_model = new ProductsModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Dashboard";
        $this->data['activeMenu'] = "dashboard";
        $this->data['customerRowCount'] = $this->customer_model->where('role', 'customer')->countAllResults();
        $this->data['productRowCount'] = $this->product_model->countAllResults();

        echo view('admin/header', $this->data);
        echo view('admin/dashboard', $this->data);
        echo view('admin/footer');
    }
}