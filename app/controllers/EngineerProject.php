<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class EngineerProject extends Controller {
    
    public function __construct(){ 
        $this->engineerProjectModel = $this->model('EngineerProjectModel');
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
        'title' => 'eZolar Inquiry',
      ];
      $this->view('Engineer/projects', $data);
    }

  }