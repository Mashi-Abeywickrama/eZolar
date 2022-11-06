<?php

class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }


    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),   
        ];
        $this->userModel->login($data['email'],$data['password']);
        $title = "Dashboard";
        if($this->userModel->login($data['email'],$data['password'])){
          $this->view('Customer/dashboard', $title);
        }
        else{
          header("Location: /ezolar/login");
        }
        }
    }
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_role'] = $user->role;
      if($_SESSION['user_role'] === 'Student'){ $_SESSION['controller'] ='student'; $_SESSION['roleName'] = 'Student'; }
      if($_SESSION['user_role'] === 'Admin'){ $_SESSION['controller'] ='admin'; $_SESSION['roleName'] = 'Admin';}
      if($_SESSION['user_role'] === 'Lecturer'){ $_SESSION['controller'] ='lecturer'; $_SESSION['roleName'] = 'Lecturer';}
      if($_SESSION['user_role'] === 'Coursemanager'){ $_SESSION['controller'] ='coursemanager'; $_SESSION['roleName'] = 'Coursemanager';}
      redirect('includes/index');
    }

    public function logout(){
        unset($_SESSION['user_id'], $_SESSION['user_email'], $_SESSION['user_email']);
        session_destroy();
        redirect('login');
    }

    
  }
