<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class ProductsModel extends Model
{
    // Table
    protected $table = 'menus';
    // allowed fields to manage
    protected $allowedFields = ['name', 'price', 'description', 'image'];
}