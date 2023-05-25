<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class OrdersModel extends Model
{
    // Table
    protected $table = 'orders';
    // allowed fields to manage
    protected $allowedFields = ['table_id', 'user_id', 'product_id', 'product_quantity', 'order_date', 'order_status'];
}