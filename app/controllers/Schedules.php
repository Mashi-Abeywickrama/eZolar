<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Schedules extends Controller {
    
    public function __construct(){ 
        //$this->engineerProjectModel = $this->model('EngineerProjectModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $date = getdate();
      $_SESSION['row'] = $date;
      $data = [
        'title' => 'eZolar Inspection Schedule',
      ];
      $this->view('Engineer/my-schedule', $data);
    }

    public function Inspection(){
        if(!isLoggedIn()){

            redirect('login');
          }
    
          $date = getdate();
          $_SESSION['row'] = $date;
          $data = [
            'title' => 'eZolar Inspection Schedule',
          ];
          $this->view('Salesperson/inspection-schedule', $data);
    }

    public function Delivery(){
        if(!isLoggedIn()){

            redirect('login');
          }
    
          $date = getdate();
          $_SESSION['row'] = $date;
          $data = [
            'title' => 'eZolar Inspection Schedule',
          ];
          $this->view('Salesperson/delivery-schedule', $data);
    }



  }