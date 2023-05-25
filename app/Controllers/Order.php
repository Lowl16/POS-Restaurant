<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\TablesModel;
use App\Models\ProductsModel;
use App\Models\OrdersModel;

class Order extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $customer_model;
    protected $table_model;
    protected $product_model;
    protected $order_model;

    public function __construct()
    {
        $this->customer_model = new UsersModel();
        $this->table_model = new TablesModel();
        $this->product_model = new ProductsModel();
        $this->order_model = new OrdersModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Order";
        $this->data['activeMenu'] = "order";

        $this->data['list'] = $this->product_model->select('*')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/order', $this->data);
        echo view('admin/footer');
    }

    public function report()
    {
        $this->data['title'] = "Orders Report";
        $this->data['activeMenu'] = "orders";

        $this->data['list'] = $this->product_model->select('*')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/reportorder', $this->data);
        echo view('admin/footer');
    }

    public function create($id='')
    {
        $this->data['title'] = "Place Order";
        $this->data['activeMenu'] = "order";

        $this->data['customers'] = $this->customer_model->getCustomers();
        $this->data['tables'] = $this->table_model->getTables();
        $this->data['products'] = $this->product_model->getProducts();

        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/order/index');
        }

        $this->data['request'] = $this->request;
        $this->data['title'] = "Place Order";
        $this->data['activeMenu'] = "order";
        $this->data['product'] = $this->product_model
            ->select(
                'menus.id,
                menus.name,
                menus.price,
                menus.description,
                menus.image'
            )
            ->where(['menus.id' => $id])
            ->first();
        echo view('admin/header', $this->data);
        echo view('admin/createorder', $this->data);
        echo view('admin/footer');
    }

    public function save()
    {
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Order";
        $this->data['activeMenu'] = "order";

        $this->data['customers'] = $this->customer_model->getCustomers();
        $this->data['tables'] = $this->table_model->getTables();
        $this->data['products'] = $this->product_model->getProducts();

        $post = [
            'table_id' => $this->request->getPost('table_id'),
            'user_id' => $this->request->getPost('user_id'),
            'product_id' => $this->request->getPost('product_id'),
            'product_quantity' => $this->request->getPost('product_quantity')
        ];
        if(!empty($this->request->getPost('id')))
            $save = $this->order_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->order_model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/order/index');
        } else {
            echo view('admin/header', $this->data);
            echo view('admin/createorder', $this->data);
            echo view('admin/footer');
        }
    }
}