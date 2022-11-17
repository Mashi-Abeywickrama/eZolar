<?php
  class Register extends Controller {
    public function __construct(){ 
        $this->registerModel = $this->model('RegisterModel');
    }
    
    public function index(){
      $data = [
        'title' => 'eZolar Signup',
      ];
     
      $this->view('Includes/header', $data);
      $this->view('Includes/footer', $data);
      $this->view('Includes/navbar', $data);
      $this->view('Authentication/register', $data);
    }
    public function dashboard(){
    
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $name = $fname .' '. $lname;
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $nic =$_POST['nic'];
        $home = $_POST['home'];
        $pwd = $_POST['pwd'];
        $type = "Customer";
        

        $inputs = array($fname,$lname,$name,$email,$mobile,$nic,$home,$pwd,$type);
        $this->registerModel->registerCustomer($inputs);

    }

  }