<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class ReportsModel extends Model
{
    // Table
    protected $table = 'reports';
    // allowed fields to manage
    protected $allowedFields = ['cashier_count', 'customer_count', 'table_count', 'product_count', 'order_count', 'order_paid', 'order_pending', 'order_unpaid', 'total_sales', 'report_date'];
}