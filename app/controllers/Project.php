<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Project extends Controller {
    
    public function __construct(){ 
    
        // $this->projectModel = new ProductModel();
        $this->projectModel = $this->model('ProjectModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
      // print_r($customer_Id);die;
      $rows  = $this->projectModel-> getAllProjects($customer_Id);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Project',
      ];
      $this->view('Customer/projects/ongoingProject', $data);
    }
    public function cancelledProjects(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
      // print_r($customer_Id);die;
      $rows  = $this->projectModel-> getCancelledProjects($customer_Id);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Project',
      ];
      $this->view('Customer/projects/cancelledProject', $data);
    }
    public function completedProjects(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
      // print_r($customer_Id);die;
      $rows  = $this->projectModel-> getCompletedProjects($customer_Id);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Project',
      ];
      $this->view('Customer/projects/completedProject', $data);
    }
    public function requestProjectPage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar Request Project',
      ];
      $this->view('Customer/projects/requestproject', $data);

    }
    public function requestProject(){
      if(!isLoggedIn()){

        redirect('login');
      }
      // print_r($_SESSION['user_email']);die();
        $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
        // print_r($_POST);die();
        $this->projectModel->newProject($_POST);

    }
    public function projectdetails(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar Request Project',
      ];
      $this->view('Customer/projects/projectdetails', $data);
    }

         // salesperson functions

      public function SalespersonViewProjects(){

//          $salesperson_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
//          $rowsAssigned  = $this->projectModel->getSalespersonAssignedProjects($salesperson_Id);
//          $_SESSION['rowsAssigned'] = $rowsAssigned;

          $rows  = $this->projectModel->SalespersonViewProjects();
          $_SESSION['rows'] = $rows;

          $data = [
              'title' => 'eZolar Salesperson Assigned Projects',
          ];
          $this->view('Salesperson/assigned-projects', $data);
          }

          public function salespersonAssignedProject($projectID){

              if (!isLoggedIn()){
                  redirect('login');
              }
              $salesperson_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
              $this->projectModel->salespersonAssignedProject($salesperson_Id,$projectID);
              redirect('Project/SalespersonViewProjects');
          }

          public function getProjectDetails($projectID){
              if (!isLoggedIn()){
                  redirect('login');
              }
              $this->projectModel->getProjectDetails($projectID);
              $data = [
                  'title' => 'eZolar Salesperson Assigned Projects',
              ];
              $this->view('Salesperson/project-details', $data);
            }
          public function COntractorAssignedProjects(){

            $rows  = $this->projectModel->getContractorProjects($this->projectModel->getUserID([$_SESSION['user_email']]));
            // print_r($rows);die;
            $_SESSION['rows'] = $rows;
            $data = [
                'title' => 'eZolar COntractor Assigned Projects',
            ];
            $this->view('Contractor/assignedProjects', $data);
          }

  }