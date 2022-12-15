<?php

class Pages extends Controller {
    public function __construct()
    {
    }

    public function index(){
        
        $this->view("pages/index");
    }
    public function contact(){
       
        $this->view('pages/contact');
    }
    public function shop(){
        
        $this->view('pages/shop');
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