<?php

class Pages extends Controller {
    public function __construct()
    {
        $this->productModel = $this->model('product');
    }

    public function index(){
        
        $this->view("pages/index");
    }
    public function contact(){
       
        $this->view('pages/contact');
    }
    public function shop(){
        $products = $this->productModel->getProducts();
        $data=[
            'products' => $products
        ];
        $this->view('pages/shop', $data);

    }
    public function blog(){
        
        $this->view('pages/blog');
    }

    public function dashboard(){
        if(!isset($_SESSION['username'])){
            redirect('users/login');
        }else{
            $this->view('pages/dashboard');
        }
        
    }
    
}