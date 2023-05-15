<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class UsersModel extends Model
{
    // Table
    protected $table = 'users';
    // allowed fields to manage
    protected $allowedFields = ['username', 'email', 'password', 'role', 'status'];
}