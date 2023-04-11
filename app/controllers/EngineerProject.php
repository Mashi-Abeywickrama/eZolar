<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class EngineerProject extends Controller {
    
    public function __construct(){ 
        $this->engineerProjectModel = $this->model('EngineerProjectModel');
        $this->PackageModel = $this->model('PackageModel');
        $this->ProductModel = $this->model('ProductModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      // print_r($customer_Id);die;
      $rows  = $this->engineerProjectModel-> getAssignedProjects($eng_Id);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Assigned Projects',
      ];
      $this->view('Engineer/projects', $data);
    }

    public function projectDetailsPage($prjID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $row = $this->engineerProjectModel->getAssignedProjectDetails($eng_Id,$prjID);
      if ($row->Salesperson_Employee_empID == ''){
        $row->Salesperson_Employee_empID = 'Not Assigned';
      }

      if ($row->Package_packageID  == ''){
        $row->Package_packageID  = 'Not Assigned';
      }

      $_SESSION['row'] = $row;
      $data = [
        'title' => 'eZolar Assigned Project Details',
      ];
      $this->view('Engineer/project-details', $data);

    }

    public function assignPackagePage($projectID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $_SESSION['projID'] = $projectID;
      $_SESSION['rows'] = $this->PackageModel-> getAllPackages();

      $data = [
        'title' => 'eZolar Assign Package',
      ];
      $this->view('Engineer/project-assign-pack', $data);

    }

    public function assignPackage($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $this->engineerProjectModel->projectAssignPack($_SESSION['projID'],$packID);
      $prjID = $_SESSION['projID'];
      unset($_SESSION['projID']);
      redirect('EngineerProject/projectDetailsPage/'.$prjID);
    }

    public function projectPackageDetailsPage($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $row = $this->PackageModel->getPackageDetails($packID);
      $_SESSION['row'] = $row;

      $rows = $this->PackageModel->getPackageContent($packID);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Pacakge details',
      ];
      $this->view('Engineer/project-package-details', $data);
    }

  }