<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('user');
    }

    public function login()
    {
        // Check the request method
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //process form
            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            //Validate username
            if (empty($data['username'])) {
                $data['username_err'] = 'username must be filled';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Password must be filled';
            }

            if(!$this->userModel->findUserByUsername($data['username'])){
                $data['username_err'] = 'User not found';
            }

            if (empty($data['username_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                if($loggedInUser){
                    //Create session 
                    flash('logged_user', "You are now logged in");
                    $this->createUserSession($loggedInUser->username);
                    $username = $_SESSION['usename'];
                    die($username);
                    $this->createUserSession($loggedInUser);
                }else{
                    $data['password_err'] = "Password is incorrect";
                    $this->view('users/login',$data);
                }
            } else {
                // Load view with errors 
                $this->view('users/login', $data);
            }
        } else {

            //init data 
            $data = [
                'username' => '',
                'password' => '',
                'username_err' => '',
                'password_err' => '',
            ];
            //load form
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['username'] = $user;
        redirect('dashboard');
    }

    public function logout(){
      
        unset($_SESSION['username']);
        session_destroy();
        redirect('users/login');
    }

    
}
