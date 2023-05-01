<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class ContractorSchedule extends Controller {
    
    public function __construct(){ 
        $this->ContractorModel = $this->model('ContractorModel');
        $this->projectModel = $this->model('ProjectModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $con_id = $this->ContractorModel->getUserID([$_SESSION['user_email']]);

      $date = getdate();
      $_SESSION['row'] = $date;

      $schedule_items = $this->ContractorModel->getScheduleItems($con_id,$date['mon'],$date['year']);
      $_SESSION['rows'] = $schedule_items;
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
          'engineer' => $engineer
  
        ];
      }else{
      $data = [
        'title' => 'eZolar My Schedule',
      ];
    }
      $this->view('contractor/schedule', $data);
    }

    public function browse($year,$month){

      if(!isLoggedIn()){

        redirect('login');
      }

      $con_id = $this->ContractorModel->getUserID([$_SESSION['user_email']]);

      $date['year'] = $year ;
      $date['mon'] = $month ;
      
      $_SESSION['row'] = $date;

      $schedule_items = $this->ContractorModel->getScheduleItems($con_id,$date['mon'],$date['year']);
      $_SESSION['rows'] = $schedule_items;
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
          'engineer' => $engineer
  
        ];
      }else{
      $data = [
        'title' => 'eZolar My Schedule',
      ];
    }
      $this->view('contractor/schedule', $data);
    }

  }