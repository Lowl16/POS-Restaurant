<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Product extends BaseController
{
    // Session
    protected $session;

    // Data
    protected $data;

    // Model
    protected $product_model;

    public function __construct()
    {
        $this->product_model = new ProductsModel();
        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index()
    {
        $this->data['title'] = "Product";
        $this->data['activeMenu'] = "product";

        $this->data['list'] = $this->product_model->select('*')->get()->getResult();

        echo view('admin/header', $this->data);
        echo view('admin/product', $this->data);
        echo view('admin/footer');
    }
    
    public function create()
    {
        $this->data['request'] = $this->request;
        $this->data['title'] = "Add Product";
        $this->data['activeMenu'] = "product";

        echo view('admin/header', $this->data);
        echo view('admin/createproduct', $this->data);
        echo view('admin/footer');
    }

    public function save()
    {
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Product";
        $this->data['activeMenu'] = "product";
        $post = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ];
        $imageFile = $this->request->getFile('image');
        $newName = $imageFile->getRandomName();
        $imageFile->move('img/products', $newName);
        $post['image'] = 'img/products/' . $newName;

        if(!empty($this->request->getPost('id')))
            $save = $this->product_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->product_model->insert($post);
        if($save){
            if(!empty($this->request->getPost('id')))
            $this->session->setFlashdata('success_message','Data has been updated successfully') ;
            else
            $this->session->setFlashdata('success_message','Data has been added successfully') ;
            $id =!empty($this->request->getPost('id')) ? $this->request->getPost('id') : $save;
            return redirect()->to('/product/index');
        }else{
            echo view('admin/header', $this->data);
            echo view('admin/createproduct', $this->data);
            echo view('admin/footer');
        }
    }

    public function detail($id='')
    {
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/product/index');
        }
        $this->data['request'] = $this->request;
        $this->data['title'] = "Product Details";
        $this->data['activeMenu'] = "product";
        $this->data['data'] = $this->product_model
            ->select(
                'menus.id,
                menus.name,
                menus.price,
                menus.description,
                menus.image'
            )
            ->where(['menus.id' => $id])
            ->first();
        echo view('admin/header', $this->data);
        echo view('admin/detailproduct', $this->data);
        echo view('admin/footer');
    }

    public function edit($id='')
    {
        $this->data['request'] = $this->request;
        $this->data['title'] = "Update Product";
        $this->data['activeMenu'] = "product";
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/product/index');
        }
        $query= $this->product_model->select('*')->where(['id'=>$id]);
        $this->data['data'] = $query->first();
        echo view('admin/header', $this->data);
        echo view('admin/editproduct', $this->data);
        echo view('admin/footer');
    }

    public function delete($id='')
    {
        if(empty($id)){
            $this->session->setFlashdata('error_message','Unknown Data ID.') ;
            return redirect()->to('/product/index');
        }
        $delete = $this->product_model->delete($id);
        if($delete){
            $this->session->setFlashdata('success_message','Product Details has been deleted successfully.') ;
            return redirect()->to('/product/index');
        }
    }
}