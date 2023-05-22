<?php

namespace App\Controllers;

class Chart extends BaseController
{
    public function index()
    {
        $data['title'] = "Chart";
        $data['activeMenu'] = "chart";

        echo view('admin/header', $data);
        echo view('admin/chart', $data);
        echo view('admin/footer');
    }   
}