<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model

    public function __construct(){
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['activeMenu'] = "dashboard";

        echo view('admin/header', $data);
        echo view('admin/dashboard', $data);
        echo view('admin/footer');
    }   
}