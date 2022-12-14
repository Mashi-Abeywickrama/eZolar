<?php

class User extends Controller {
    public function __construct(){
      $this->userModel = $this->model('UserModel');
      
    }


    public function dashboard(){
      $title = "Dashboard";
      $this->view('Customer/dashboard', $title);
    }
    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // Process form
        // Sanitize POST data
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          // print_r($_POST);die();
          // Init data
          $data =[
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),   
          ];
          $this->userModel->login($data['email'],$data['password']);
          if($this->userModel->login($data['email'],$data['password'])){
            $_SESSION['user_email'] = $data['email'];
            // header("Location: /");
            redirect('user/dashboard');
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
      if($_SESSION['user_role'] === 'Customer'){ $_SESSION['controller'] ='Customer'; $_SESSION['roleName'] = 'Customer'; }
      if($_SESSION['user_role'] === 'Admin'){ $_SESSION['controller'] ='admin'; $_SESSION['roleName'] = 'Admin';}
      if($_SESSION['user_role'] === 'Engineer'){ $_SESSION['controller'] ='Engineer'; $_SESSION['roleName'] = 'Engineer';}
      if($_SESSION['user_role'] === 'Salesperson'){ $_SESSION['controller'] ='Salesperson'; $_SESSION['roleName'] = 'Salesperson';}
      if($_SESSION['user_role'] === 'Storekeeper'){ $_SESSION['controller'] ='Storekeeper'; $_SESSION['roleName'] = 'Storekeeper';}
      if($_SESSION['user_role'] === 'Contractor'){ $_SESSION['controller'] ='Contractor'; $_SESSION['roleName'] = 'Contractor';}
      redirect('includes/index');
    }

    public function logout(){
        unset($_SESSION['user_id'], $_SESSION['user_email'], $_SESSION['user_email']);
        session_destroy();
        redirect('login');
    }

    
  }
?>
