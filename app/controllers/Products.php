<?php 
class Products extends Controller {
    public function __construct()
    {
        $this->productModel = $this->model('product');
    }
    public function add()
    {
       $this->view('products/add');
    }
}