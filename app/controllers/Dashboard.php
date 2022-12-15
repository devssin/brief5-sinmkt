<?php 
class Dashboard extends Controller{
    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->dashboardModel = $this->model('product');
    }
    public function index()
    {
        $products = $this->dashboardModel->getProducts();
        $data = [
            'products' => $products,
        ];
        $this->view('dashboard/index',$data);
    }
}