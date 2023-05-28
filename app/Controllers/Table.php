<?php

namespace App\Controllers;

use App\Models\TablesModel;

class Table extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $table_model;

    public function __construct(){
        $this->table_model = new TablesModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Table";
        $this->data['activeMenu'] = "table";

        $this->data['list'] = $this->table_model->select('*')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/table', $this->data);
        echo view('admin/footer');
    }
    
    public function create(){
        $this->data['title'] = "Add Table";
        $this->data['activeMenu'] = "table";
        $this->data['request'] = $this->request;

        echo view('admin/header', $this->data);
        echo view('admin/createtable', $this->data);
        echo view('admin/footer');
    }

    public function save(){
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Table";
        $this->data['activeMenu'] = "table";
        $post = [
            'name' => $this->request->getPost('name'),
            'size' => $this->request->getPost('size')
        ];
        if(!empty($this->request->getPost('id')))
            $save = $this->table_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->table_model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/table/index');
        }else{
            echo view('admin/header', $this->data);
            echo view('admin/createtable', $this->data);
            echo view('admin/footer');
        }
    }

    public function edit($id=''){
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Table";
        $this->data['activeMenu'] = "table";
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/table/index');
        }
        $query= $this->table_model->select('*')->where(['id'=>$id]);
        $this->data['data'] = $query->first();
        echo view('admin/header', $this->data);
        echo view('admin/edittable', $this->data);
        echo view('admin/footer');
    }

    public function delete($id=''){
        
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/table/index');
        }
        $delete = $this->table_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Customer Details has been deleted successfully.') ;
            return redirect()->to('/table/index');
        }
    }
}