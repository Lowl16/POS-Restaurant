<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class TablesModel extends Model
{
    // Table
    protected $table = 'tables';
    // allowed fields to manage
    protected $allowedFields = ['name', 'size'];

    public function getTables()
    {
        return $this->findAll();
    }
}