<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\OrdersModel;
use App\Models\PaymentsModel;

class Payment extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $customer_model;
    protected $order_model;
    protected $payment_model;

    public function __construct()
    {
        $this->customer_model = new UsersModel();
        $this->order_model = new OrdersModel();
        $this->payment_model = new PaymentsModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Payment";
        $this->data['activeMenu'] = "payment";

        $this->data['list'] = $this->order_model->getOrderPayment();

        echo view('admin/header', $this->data);
        echo view('admin/payment', $this->data);
        echo view('admin/footer');
    }

    public function report()
    {
        $this->data['title'] = "Payments Report";
        $this->data['activeMenu'] = "payments";

        $this->data['list'] = $this->payment_model->select('*')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/reportpayment', $this->data);
        echo view('admin/footer');
    }

    public function save()
    {
        $this->data['request'] = $this->request;
        $this->data['title'] = "Pay Order";
        $this->data['activeMenu'] = "payment";

        $post = [
            'order_id' => $this->request->getPost('order_id'),
            'user_id' => $this->request->getPost('user_id'),
            'pay_amount' => $this->request->getPost('pay_amount'),
            'pay_method' => $this->request->getPost('pay_method')
        ];
        if(!empty($this->request->getPost('id')))
            $save = $this->payment_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->payment_model->insert($post);
        if($save){
            $orderUpdate = $this->order_model->where(['id' => $post['order_id']])->set(['order_status' => 'PAID'])->update();

            if(!empty($this->request->getPost('id')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/payment/index');
        } else {
            echo view('admin/header', $this->data);
            echo view('admin/payorder', $this->data);
            echo view('admin/footer');
        }
    }

    public function pay($id='')
    {
        $this->data['request'] = $this->request;
        $this->data['title'] = "Pay Order";
        $this->data['activeMenu'] = "payment";
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/payment/index');
        }
        $query= $this->order_model->select('orders.*, menus.price, users.username')->where(['orders.id'=>$id])->join('menus', 'menus.id = orders.product_id')->join('users', 'users.id = orders.user_id');
        $this->data['data'] = $query->first();
        echo view('admin/header', $this->data);
        echo view('admin/payorder', $this->data);
        echo view('admin/footer');
    }

    public function delete($id='')
    {
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/payment/index');
        }
        $delete = $this->order_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Product Details has been deleted successfully.') ;
            return redirect()->to('/payment/index');
        }
    }
}