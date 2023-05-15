<?php

namespace App\Controllers;

class Main extends BaseController
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

    public function index(){
        $this->data['page_title'] = "Home Page";

        echo view('template/header', $this->data);
        echo view('user/home', $this->data);
        echo view('template/footer');
    }
}