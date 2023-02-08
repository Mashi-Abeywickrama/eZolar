<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'/app/helpers/session_helper.php');
class User extends Controller {
    public function __construct(){
      $this->userModel = $this->model('UserModel');
      
    }

    public function home(){
      $data = [
        'title' => 'eZolar Home',
      ];
     
      $this->view('Includes/header', $data);
      $this->view('Includes/navbar', $data);
      $this->view('home', $data);
    }
    
    public function dashboard(){
      if(!isLoggedIn()){

        redirect('login');
      }
      else{
        $title = "Dashboard";
        if ($this->userModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
          $this->view('Storekeeper/dashboard', $title);
        }
        elseif ($this->userModel->getUserRole($_SESSION['user_email']) == "Contractor"){
          $this->view('Contractor/dashboard', $title);
        }elseif ($this->userModel->getUserRole($_SESSION['user_email']) == "Admin"){
          $this->view('Admin/dashboard', $title);
        }elseif ($this->userModel->getUserRole($_SESSION['user_email']) == "Engineer"){
          $this->view('Engineer/dashboard', $title);
        }else{
          $this->view('Customer/dashboard', $title);
        }
      }

    }
    // public function customer_dashboard(){
    //   if(!isLoggedIn()){

    //     redirect('login');
    //   }
    //   $title = "Dashboard";
    //   $this->view('Customer/dashboard', $title);
    // }
    // public function sk_dashboard(){
    //   if(!isLoggedIn()){

    //     redirect('login');
    //   }
    //   $title = "Dashboard";
    //   $this->view('Storekeeper/dashboard', $title);
    // }
    // public function contractor_dashboard(){
    //   if(!isLoggedIn()){

    //     redirect('login');
    //   }
    //   $title = "Dashboard";
    //   $this->view('Contractor/dashboard', $title);
    // }
    
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
            redirect('user/dashboard');
            // header("Location: /");
            // if ($this->userModel->getUserRole($data['email']) == "Storekeeper"){
            //   redirect('user/sk_dashboard');
            // }
            // elseif ($this->userModel->getUserRole($data['email']) == "Contractor"){
            //   redirect('user/contractor_dashboard');
            // }else{
            //   redirect('user/dashboard');
            // }
          }
          else{
            header("Location: /ezolar/login");
          }
        }
    }
// this function is for viewing user profile
    public function profile(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $title = "myprofile";
      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      $id = $this->userModel->getUserID($_SESSION['user_email']);
      $rows  = $this->userModel-> getProfile($id,$role);
      $_SESSION['rows'] = $rows;
      $this->view('Customer/Settings/profile', $title);
      
    }
    
//this function for edit profile
     public function editprofile(){

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