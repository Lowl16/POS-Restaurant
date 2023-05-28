<?php

namespace App\Controllers;

use App\Models\OrdersModel;
use App\Models\ProductsModel;
use App\Models\UsersModel;
use App\Models\PaymentsModel;
use App\Models\ReportsModel;
use App\Models\TablesModel;

class Dashboard extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $cashier_model;
    protected $customer_model;
    protected $table_model;
    protected $product_model;
    protected $order_model;
    protected $payment_model;
    protected $report_model;

    public function __construct(){
        $this->cashier_model = new UsersModel();
        $this->customer_model = new UsersModel();
        $this->table_model = new TablesModel();
        $this->product_model = new ProductsModel();
        $this->order_model = new OrdersModel();
        $this->payment_model = new PaymentsModel();
        $this->report_model = new ReportsModel();
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

        $this->data['list'] = $this->report_model->select('*')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/dashboard', $this->data);
        echo view('admin/footer');
    }

    public function generate(){
        $post = [
            'cashier_count' => (int) $this->cashier_model->where('role', 'cashier')->countAllResults(),
            'customer_count' => (int) $this->customer_model->where('role', 'customer')->countAllResults(),
            'table_count' => (int) $this->table_model->countAllResults(),
            'product_count' => (int) $this->product_model->countAllResults(),
            'order_count' => (int) $this->order_model->countAllResults(),
            'order_paid' => (int) $this->order_model->where('order_status', 'PAID')->countAllResults(),
            'order_pending' => (int) $this->order_model->where('order_status', 'PENDING')->countAllResults(),
            'order_unpaid' => (int) $this->order_model->where('order_status', 'UNPAID')->countAllResults(),
            'total_sales' => (int) $this->payment_model->selectSum('pay_amount')->get()->getRow()->pay_amount
        ];
        $save = $this->report_model->insert($post);
        if($save){
            $this->session->setFlashdata('success_message','Data has been generated successfully') ;
            return redirect()->to('/dashboard/index');
        }else{
            echo view('admin/header', $this->data);
            echo view('admin/dashboard', $this->data);
            echo view('admin/footer');
        }
    }
}