<?php 
/*
    This is the base controller 
    Loads the models and views
*/
Class Controller{
    // Load model 

    public function model($model)
    {
        //Require the model
        require_once "../app/models/$model.php";

        //Instantiate Model
        return new $model();
    }
    // Load view 

    public function view($view,$data =[])
    {
        //check for the view file 
        if(file_exists("../app/views/$view.php")){
            //Require the view
            require_once "../app/views/$view.php";
        }
        else{
            die("View does not exist");
        }
    }

    
}