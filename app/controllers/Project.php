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
        'title' => 'eZolar Inquiry',
      ];
      $this->view('Customer/project', $data);
    }
    public function requestProjectPage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar Request Project',
      ];
      $this->view('Customer/requestproject', $data);

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

  }