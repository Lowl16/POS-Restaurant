<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class OrdersModel extends Model
{
    // Table
    protected $table = 'orders';
    // allowed fields to manage
    protected $allowedFields = ['table_id', 'user_id', 'product_id', 'product_quantity', 'order_date', 'order_status'];

    public function getOrderReport()
    {
        return $this->select('orders.*, users.username, tables.name as table_name, menus.name as product_name, menus.price')
                    ->join('users', 'users.id = orders.user_id')
                    ->join('tables', 'tables.id = orders.table_id')
                    ->join('menus', 'menus.id = orders.product_id')
                    ->orderBy('orders.order_date', 'DESC')
                    ->get()
                    ->getResult();
    }

    public function getOrderReceipt()
    {
        return $this->select('orders.*, users.username, tables.name as table_name, menus.name as product_name, menus.price')
                    ->where('order_status', 'PAID')
                    ->join('users', 'users.id = orders.user_id')
                    ->join('tables', 'tables.id = orders.table_id')
                    ->join('menus', 'menus.id = orders.product_id')
                    ->get()
                    ->getResult();
    }

    public function getOrderPayment()
    {
        return $this->select('orders.*, users.username, tables.name as table_name, menus.name as product_name, menus.price')
                    ->where('order_status', 'PENDING')
                    ->join('users', 'users.id = orders.user_id')
                    ->join('tables', 'tables.id = orders.table_id')
                    ->join('menus', 'menus.id = orders.product_id')
                    ->get()
                    ->getResult();
    }

    public function updateOrderStatus()
    {
        $yesterday = date('Y-m-d H:i:s', strtotime('-1 day'));

        $this->set('order_status', 'UNPAID')
            ->where('order_status', 'PENDING')
            ->where('order_date <=', $yesterday)
            ->update();
    }
    }
