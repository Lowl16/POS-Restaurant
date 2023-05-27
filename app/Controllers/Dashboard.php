<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\ProductsModel;
use App\Models\UsersModel;
use App\Models\PaymentsModel;

class Dashboard extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $customer_model;
    protected $product_model;
    protected $order_model;
    protected $payment_model;

    public function __construct(){
        $this->customer_model = new UsersModel();
        $this->product_model = new ProductsModel();
        $this->order_model = new OrdersModel();
        $this->payment_model = new PaymentsModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Dashboard";
        $this->data['activeMenu'] = "dashboard";
        $this->data['customerRowCount'] = $this->customer_model->where('role', 'customer')->countAllResults();
        $this->data['productRowCount'] = $this->product_model->countAllResults();
        $this->data['orderRowCount'] = $this->order_model->countAllResults();
        $this->data['salesCount'] = $this->payment_model->selectSum('pay_amount')->get()->getRow();

        echo view('admin/header', $this->data);
        echo view('admin/dashboard', $this->data);
        echo view('admin/footer');
    }
}