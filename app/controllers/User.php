<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'/app/helpers/session_helper.php');
class User extends Controller {
    public function __construct(){
      $this->ContractorModel = $this->model('ContractorModel');
      $this->projectModel = $this->model('ProjectModel');
      $this->userModel = $this->model('UserModel');
      
    }

    public function home(){
      $data = [
        'title' => 'eZolar Home',
      ];
      if(!isLoggedIn()){
      $this->view('Includes/header', $data);
        $this->view('Includes/navbar1', $data);
        $this->view('home', $data);
      }
     
      // $this->view('Includes/header', $data);
      $this->view('Customer/navbar', $data);
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
        }else{
          $cus_id = $this->projectModel->getUserID([$_SESSION['user_email']]);

          $date = getdate();
          $_SESSION['row'] = $date;
    
          $schedule_items = $this->projectModel->getScheduleItems($cus_id,$date['mon'],$date['year']);

          $_SESSION['rows'] = $schedule_items;

          $completed = count($this->projectModel->getCompletedProjects($cus_id));
          $ongoing = count($this->projectModel->getAllProjects($cus_id));
          $cancelled = count($this->projectModel->getCancelledProjects($cus_id));
          // print_r($ongoing);die;
          $data = [
            'title' => $title,
            "ongoing" => $ongoing,
            'completed' => $completed,
            'cancelled' => $cancelled,
          ];
          // print_r($data);die;
          $this->view('Customer/dashboard', $data);
        }
      }

      

    }

    public function browse($year,$month){

      if(!isLoggedIn()){

        redirect('login');
      }

      $cus_id = $this->projectModel->getUserID([$_SESSION['user_email']]);

      $date['year'] = $year ;
      $date['mon'] = $month ;
      
      $_SESSION['row'] = $date;

      $schedule_items = $this->projectModel->getScheduleItems($cus_id,$date['mon'],$date['year']);
      $_SESSION['rows'] = $schedule_items;
      $completed = count($this->projectModel->getCompletedProjects($cus_id));
          $ongoing = count($this->projectModel->getAllProjects($cus_id));
          $cancelled = count($this->projectModel->getCancelledProjects($cus_id));
      if (isset($_GET['project_id'])) {
        $project = $this->projectModel->getProjectDetailsCustomer($_GET['project_id']);
        $salesperson = $this->projectModel->getSalesPersonDetails($_GET['project_id']);
        $schedule = $this->projectModel->getdSchedule($_GET['project_id']);
        
        // print_r($salesperson);die();
        $engineer = $this->projectModel->getEngineer($_GET['project_id']);
        $data = [
          'title' => 'eZolar COntractor Assigned Projects',
          'project' => $project,
          'schedule' => $schedule,
          'salesperson' => $salesperson,
          'engineer' => $engineer,
         
  
        ];
      }else{
      $data = [
         "ongoing" => $ongoing,
            'completed' => $completed,
            'cancelled' => $cancelled,
        'title' => 'eZolar My Schedule',
      ];
    }
      $this->view('Customer/dashboard', $data);
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
            $_SESSION['user_pic'] = $this->userModel->getProfile($id,$role)[0]->profilePhoto;
  
            
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
      // print_r($name);die;
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
      $data = [
      'title' => "edit profile",
      'rows'=> $rows,];
      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      //redirect to the correct edit profile page according to the user
      if ($role == "Storekeeper"){
        $this->view('Storekeeper/editprofile', $title);
      }elseif ($role == "Customer"){
        $this->view('Customer/Settings/editprofile', $title);
      }elseif ($role == "Contractor"){
        $this->view('Contractor/editprofile', $data);
      }elseif ($role == "Salesperson"){
        $this->view('Salesperson/editprofile',$title);
      }
    }
    
    public function updateprofile(){
      
      $title = "edit profile";
      //get user role and the user id from the session
      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      $user_Id = $this->userModel->getUserID($_SESSION['user_email']); 

      $target_dir = "C:/xampp/htdocs/ezolar/public/img/user-pics/";
      $file_upload = false;
      // Checking whether a file is uploaded
      if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
          $filename = basename($_FILES["fileToUpload"]["name"]);
          $file_upload = true;
      } else {
          $filename = $_SESSION['user_pic'];
      }
      $target_file = $target_dir . $filename;
      
      
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      if($file_upload){
              // Check if image file is a actual image or fake image
              if (isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if ($check !== false) {
                      echo "File is an image - " . $check["mime"] . ".";
                      $uploadOk = 1;
                  } else {
                      echo "File is not an image.";
                      $uploadOk = 0;
                  }
              }
              // Check if file already exists
              if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
              }
              // Check file size
              if ($_FILES["fileToUpload"]["size"] > 500000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
              }
              // Allow certain file formats
              if (
                  $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                  && $imageFileType != "gif"
              ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
              }
              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
                  // if everything is ok, try to upload file
              } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                      echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
              }

        }

        $inputs = ($_POST); 
       
        // print_r($inputs);die;
        if($this->userModel->editProfile($inputs,$role, $user_Id,$filename)){
          $_SESSION['user_pic'] = $filename;
          $_SESSION['name'] = $inputs['name'];
          

          if ($role == "Storekeeper"){
            $this->view('Storekeeper/editprofile', $title);
          }elseif ($role == "Customer"){
            $this->view('Customer/Settings/editprofile', $title);
          }elseif ($role == "Salesperson"){
            $this->view('Salesperson/editprofile', $title);
          }elseif ($role == "Contractor"){
           header('Location: ./editprofile');
          }
          
        }
        else{
          echo "Mashi is idiot";
        };
    }
// load the page for update password
    public function updatePasswordpage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      
      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      
      $id = $this->userModel->getUserID($_SESSION['user_email']);
      $rows  = $this->userModel-> getProfile($id,$role);
      
      $_SESSION['rows'] = $rows;
      
      $title = "edit profile";
      $role = $this->userModel->getUserRole($_SESSION['user_email']);
      //redirect to the correct edit profile page according to the user
      if ($role == "Storekeeper"){
        $this->view('Storekeeper/editprofile', $title);
      }elseif ($role == "Customer"){
        $this->view('Customer/Settings/changepassword', $title);
      }elseif ($role == "Contractor"){
        $this->view('Contractor/editprofile', $title);
      }elseif ($role == "Salesperson"){
        $this->view('Salesperson/editProfile',$title);
      }
    }

//this function is to update user password
public function updatePassword(){
  // $curpwd = $_POST['currentpassword'];
  $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
  // $confirm = $_POST['cpassword'];
  // print_r($confirm);die;
  $this->userModel->updatePassword($_SESSION['user_email'],$pwd);
  flash($name = 'test', $message = 'Updated', $class = 'success alert-msg');
  // redirect('login');

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