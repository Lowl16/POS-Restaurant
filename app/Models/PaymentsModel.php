<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class PaymentsModel extends Model
{
    // Table
    protected $table = 'payments';
    // allowed fields to manage
    protected $allowedFields = ['order_id', 'user_id', 'pay_amount', 'pay_method', 'paid_at'];
}