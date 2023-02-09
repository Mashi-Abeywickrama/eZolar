<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/app/helpers/session_helper.php');
  class Employee extends Controller {
    public function __construct(){ 
      $this->employeeModel = $this->model('EmployeeModel');
    }
    
    public function index(){

        if (!isLoggedIn()){
            redirect('login');
        }

      $rows  = $this->employeeModel-> getAllEmployees();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'ezolar Employees',
      ];
    
      $this->view('Admin/employees', $data);
    }

    public function addEmployee(){
        if (!isLoggedIn()){
            redirect('login');
        }
      $data = [
        'title' => 'ezolar Employees',
      ];
    
      $this->view('Admin/add-employee', $data);
    }


    public function newEmployee(){
        if (!isLoggedIn()){
            redirect('login');
        }
      $data = [
        'title' => 'ezolar successful',
      ];


      $this->view('Admin/add-employee-successful', $data);

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $name = $fname .' '. $lname;
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $nic =$_POST['nic'];
      $type = $_POST['employee-type'];
      $gender = $_POST['gender'];
      $password = "emp123#";
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      // $email = $_POST['email'];
      // $pwd = "password";



      $inputs = array($fname,$lname,$name,$email,$mobile,$nic,$type,$gender,$hashed_password);
      $this->employeeModel->addEmployee($inputs);
    }


    public function engineers(){

        if(!isLoggedIn()){

            redirect('login');
        }

        else{
            $rows  = $this->employeeModel-> getAllEngineers();
            $_SESSION['rows'] = $rows;

            $data = [
                'title' => 'ezolar Engineers',
            ];
            if ($this->employeeModel->getUserRole($_SESSION['user_email']) == "Admin"){
                $this->view('Admin/engineers', $data);
            }
            elseif ($this->employeeModel->getUserRole($_SESSION['user_email']) == "Salesperson"){
                $this->view('Salesperson/engineers', $data);
            }
        }


//        if (!isLoggedIn()){
//            redirect('login');
//        }
//      $rows  = $this->employeeModel-> getAllEngineers();
//      $_SESSION['rows'] = $rows;
//      $data = [
//        'title' => 'ezolar Engineers',
//      ];
//
//      $this->view('Admin/engineers', $data);
    }

    public function storekeepers(){
        if (!isLoggedIn()){
            redirect('login');
        }
      $rows  = $this->employeeModel-> getAllStorekeepers();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'ezolar Storekeepers',
      ];
    
      $this->view('Admin/storekeepers', $data);
    }

    public function salespersons(){
        if (!isLoggedIn()){
            redirect('login');
        }
      $rows  = $this->employeeModel-> getAllSalespersons();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'ezolar Salespersons',
      ];
    
      $this->view('Admin/salespersons', $data);
    }

    public function contractors(){

        if(!isLoggedIn()){

            redirect('login');
        }

        else{
            $rows  = $this->employeeModel-> getAllContractors();
            $_SESSION['rows'] = $rows;

            $data = [
                'title' => 'ezolar Contractors',
            ];
            if ($this->employeeModel->getUserRole($_SESSION['user_email']) == "Admin"){
                $this->view('Admin/contractors', $data);
            }
            elseif ($this->employeeModel->getUserRole($_SESSION['user_email']) == "Salesperson"){
                $this->view('Salesperson/contractors', $data);
            }
        }



//        if (!isLoggedIn()){
//            redirect('login');
//        }
//      $rows  = $this->employeeModel-> getAllContractors();
//      $_SESSION['rows'] = $rows;
//      $data = [
//        'title' => 'ezolar Contractors',
//      ];
//
//      $this->view('Admin/contractors', $data);
    }

    public function EngineersAndContractors(){
        if (!isLoggedIn()){
            redirect('login');
        }
        $data = [
            'title' => 'ezolar Engineers and Contractors',
        ];

        $this->view('Salesperson/engineers-contractors', $data);
    }


    // public function addSuccessful(){
    //   $data = [
    //     'title' => 'ezolar successful',
    //   ];
    
    //   $this->view('Admin/add-employee-successful', $data);
    // }



  }
  ?>