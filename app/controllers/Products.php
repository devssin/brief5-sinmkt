<?php 
class Products extends Controller {
    public function __construct()
    {
        if(!isLoggedIn()){
            redirect('users/login');
        }
        $this->productModel = $this->model('product');
    }
    public function index()
    {
        $products = $this->productModel->getProducts();
        $data = [
            'products' => $products,
        ];
        $this->view('products/index',$data);
    }
    public function add()
    {// Check the request method
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // process form
            $data = [
                'name' => trim($_POST['name']),
                'image' => $_FILES['image'] ?? null,
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'id_cat' => trim($_POST['id_cat'])  ,
                'name_err' => '',
                'image_err' => '',
                'price_err' => '',
                'description_err' => '',
                'id_cat_err' => ''
            ];

            //Validate username
            if (empty($data['name'])) {
                $data['name_err'] = 'Name must be filled';
            }
            if (!$data['image']) {
                $data['image_err'] = 'Image must be filled';
            }
            
            if (!$data['price']) {
                $data['price_err'] = 'Price must be filled';
            }
            
            if (empty($data['description'])) {
                $data['description_err'] = 'Description must be filled';
            }
            if ($data['id_cat'] == 0) {
                $data['id_cat_err'] = 'Category must be selected';
            }

            

            if (empty($data['name_err']) && empty($data['image_err']) && empty($data['description_err'] && empty($data['id_cat_err']))) {
                $data += ['imagePath' => $this->uploadImg()];
                if($this->productModel->addProduct($data)){
                    flash('product_success', "Product Added Successfully");
                    redirect("products");
                }else{
                    die('somthing went wrong');
                }
                
            } else {
                // Load view with errors 
               $this->view('products/add', $data);
            }
        } else {
            $categories = $this->productModel->getCategories();

            //init data 
            $data = [
                'name' => '',
                'image' => '',
                'price' => '',
                'description' => '',
                'id_cat' => '' ,
                'name_err' => '',
                'image_err' => '',
                'price_err' => '',
                'description_err' => '',
                'id_cat_err' => '',
                'categories' => $categories

            ];
            //load form
            $this->view('products/add', $data);
        }
    }
    public function edit($id)
    {// Check the request method
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //process form
            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'image' => $_FILES['image'] ?? null,
                'price' => trim($_POST['price']),
                'description' => trim($_POST['description']),
                'id_cat' => trim($_POST['id_cat'])  ,
                'name_err' => '',
                'image_err' => '',
                'price_err' => '',
                'description_err' => '',
                'id_cat_err' => ''
            ];

            //Validate username
            if (empty($data['name'])) {
                $data['name_err'] = 'Name must be filled';
            }
            if (!$data['image']) {
                $data['image_err'] = 'Image must be filled';
            }
            if (empty($data['description'])) {
                $data['description_err'] = 'Description must be filled';
            }
            if (empty($data['price'])) {
                $data['price_err'] = 'Price must be filled';
            }
            if ($data['id_cat'] == 0) {
                $data['id_cat_err'] = 'Category must be selected';
            }

            

            if (empty($data['name_err']) && empty($data['image_err']) && empty($data['description_err'] && empty($data['id_cat_err']))) {
                $data +=['imagePath' => $this->uploadImg()] ;
                if($this->productModel->edit($data)){
                    flash('product_success', "Product Edited Successfully");
                    redirect("products");
                }else{
                    die('somthing went wrong');
                }
                
            } else {
                // Load view with errors 
               $this->view('products/add', $data);
            }
        } else {
            $categories = $this->productModel->getCategories();
            $product = $this->productModel->getSingleProduct($id);

            //init data 
            $data = [
                'id' => $product->id_prod,
                'name' => $product->name,
                'image' => $product->image,
                'price' => $product->price,
                'description' => $product->description,
                'id_cat' => $product->id_cat ,
                'name_err' => '',
                'image_err' => '',
                'price_err' => '',
                'description_err' => '',
                'id_cat_err' => '',
                'categories' => $categories

            ];
            //load form
            $this->view('products/edit', $data);
        }
    }
    
    public function delete($id)
    {
        if($this->productModel->delete($id)){
            flash("product_success", "Product deleted successfully");
            redirect('products');
        }else{
            die("somthing went wrong");
        }
    }


    public function uploadImg()
    {
        $image = $_FILES['image'];
        $imagePath = "img/". randomString(8)."/".$image['name'];
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name'],$imagePath);
        return $imagePath;

    }
    

}