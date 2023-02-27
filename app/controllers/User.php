<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'\app\helpers\session_helper.php');
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
        //load correctt dashboard according to the user role
        if ($this->userModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
          $this->view('Storekeeper/dashboard', $title);
        }
        elseif ($this->userModel->getUserRole($_SESSION['user_email']) == "Contractor"){
          $this->view('Contractor/dashboard', $title);
        }elseif ($this->userModel->getUserRole($_SESSION['user_email']) == "Admin"){
          $this->view('Admin/dashboard', $title);
        }elseif ($this->userModel->getUserRole($_SESSION['user_email']) == "Engineer"){
          $this->view('Engineer/dashboard', $title);
        }elseif ($this->userModel->getUserRole($_SESSION['user_email']) == "Salesperson"){
            $this->view('Salesperson/dashboard', $title);
        } else{
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
            $id = $this->userModel->getUserID($data['email']);
            $role = $this->userModel->getUserRole($_SESSION['user_email']);
            $name = $this->userModel->getProfile($id,$role)[0]->name;
            $_SESSION['user_pic'] = $this->userModel->getProfile($id,$role)[0]->profile;
  
            
            $_SESSION['name'] = $name;
            redirect('user/dashboard');

          }
          else{
            header("Location: /ezolar/login");
          }
        }
    }

    //a function to get username in header
    public function getName(){
      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      $name = $this->userModel->getProfile($role,$_SESSION['user_email']);
      print_r($name);die;
      $_SESSION['name'] = $name;
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
      if ($role == "Storekeeper"){
        $this->view('Storekeeper/profile', $title);
      }
      elseif ($role == "Contractor"){
        $this->view('Contractor/profile', $title);
      }elseif ($role == "Admin"){
        $this->view('Admin/myProfile', $title);
      }elseif ($role == "Engineer"){
        $this->view('Engineer/profile', $title);
      }elseif ($role == "Salesperson") {
          $this->view('Salesperson/profile', $title);
      } else {
        $this->view('Customer/Settings/profile', $title);
      }
      
    }
    
//this function for loading edit profile page
     public function editprofile(){
      if(!isLoggedIn()){

        redirect('login');
      }
      
      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      
      $id = $this->userModel->getUserID($_SESSION['user_email']);
      $rows  = $this->userModel-> getProfile($id,$role);
      
      $_SESSION['rows'] = $rows;
      
      $title = "edit profile";

      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      $user_Id = $this->userModel->getUserID($_SESSION['user_email']);

      $inputs = ($_POST);
      if ($this->userModel->editProfile($inputs,$role,$user_Id)){
          if ($role == "Storekeeper"){
              $this->view('Storekeeper/editprofile', $title);
          }elseif ($role == "Customer"){
              $this->view('Customer/Settings/editprofile', $title);
          }elseif ($role == "Contractor"){
              $this->view('Contractor/editprofile', $title);
          }elseif ($role == "Salesperson"){
              $this->view('Salesperson/editProfile',$title);
          }
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_pic'] = $user->profile;
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