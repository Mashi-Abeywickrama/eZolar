<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class EngineerSchedule extends Controller {
    
    public function __construct(){ 
        $this->engineerScheduleModel = $this->model('EngineerScheduleModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $eng_Id = $this->engineerScheduleModel->getUserID([$_SESSION['user_email']]);

      $date = getdate();
      $_SESSION['row'] = $date;

      $schedule_items = $this->engineerScheduleModel->getScheduleItems($eng_Id,$date['mon'],$date['year']);
      $_SESSION['rows'] = $schedule_items;
      $data = [
        'title' => 'eZolar My Schedule',
      ];
      $this->view('Engineer/my-schedule', $data);
    }

    public function browse($year,$month){

      if(!isLoggedIn()){

        redirect('login');
      }

      $eng_Id = $this->engineerScheduleModel->getUserID([$_SESSION['user_email']]);

      $date['year'] = $year ;
      $date['mon'] = $month ;
      
      $_SESSION['row'] = $date;

      $schedule_items = $this->engineerScheduleModel->getScheduleItems($eng_Id,$date['mon'],$date['year']);
      $_SESSION['rows'] = $schedule_items;
      $data = [
        'title' => 'eZolar My Schedule',
      ];
      $this->view('Engineer/my-schedule', $data);
    }

  }