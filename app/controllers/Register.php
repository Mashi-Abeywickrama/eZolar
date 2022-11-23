<?php
  class Register extends Controller {
    public function __construct(){ 
        $this->registerModel = $this->model('RegisterModel');
    }
    
    public function index(){
      $data = [
        'title' => 'eZolar Signup',
      ];
      $this->view('Authentication/register', $data);
    }
    public function dashboard(){
        // print_r($_POST);die();
    
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $name = $fname .' '. $lname;
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $nic =$_POST['nic'];
        $home = $_POST['home'];
        $pwd = $_POST['pwd'];
        $type = "Customer";
        $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);
        

        $inputs = array($fname,$lname,$name,$email,$mobile,$nic,$home,$pwd,$type,$hashed_password);
        // print_r($inputs);die();
        $this->registerModel->registerCustomer($inputs);

    }

  }