<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
//   require_once(__ROOT__.'/app/helpers/session_helper.php');

  class SalespersonSchedules extends Controller {
    
    public function __construct(){
        $this->SalespersonScheduleModel = $this->model('SalespersonScheduleModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

    }

    public function InspectionSchedule(){
        if(!isLoggedIn()){

            redirect('login');
          }

        $sales_Id = $this->SalespersonScheduleModel->getUserID([$_SESSION['user_email']]);

        $date = getdate();
        $_SESSION['row'] = $date;

        $schedule_items = $this->SalespersonScheduleModel->getInspectionScheduleItems($sales_Id,$date['mon'],$date['year']);
        $_SESSION['rows'] = $schedule_items;
        $data = [
            'title' => 'eZolar inspection Schedule',
        ];
        $this->view('Salesperson/inspection-schedule', $data);
    }

    public function InspectionBrowse($year,$month){

        if(!isLoggedIn()){

            redirect('login');
        }

        $sales_Id = $this->SalespersonScheduleModel->getUserID([$_SESSION['user_email']]);

        $date['year'] = $year ;
        $date['mon'] = $month ;

        $_SESSION['row'] = $date;

        $schedule_items = $this->SalespersonScheduleModel->getInspectionScheduleItems($sales_Id,$date['mon'],$date['year']);
        $_SESSION['rows'] = $schedule_items;
        $data = [
            'title' => 'eZolar inspection browser',
        ];
        $this->view('Salesperson/inspection-schedule', $data);
    }

    public function DeliverySchedule(){
        if(!isLoggedIn()){

            redirect('login');
        }

        $sales_Id = $this->SalespersonScheduleModel->getUserID([$_SESSION['user_email']]);

        $date = getdate();
        $_SESSION['row'] = $date;

        $schedule_items = $this->SalespersonScheduleModel->getDeliveryScheduleItems($sales_Id,$date['mon'],$date['year']);
        $_SESSION['rows'] = $schedule_items;
        $data = [
            'title' => 'eZolar delivery Schedule',
        ];
        $this->view('Salesperson/delivery-schedule', $data);
    }

    public function DeliveryBrowse($year,$month){

        if(!isLoggedIn()){

            redirect('login');
        }

        $sales_Id = $this->SalespersonScheduleModel->getUserID([$_SESSION['user_email']]);

        $date['year'] = $year ;
        $date['mon'] = $month ;

        $_SESSION['row'] = $date;

        $schedule_items = $this->SalespersonScheduleModel->getDeliveryScheduleItems($sales_Id,$date['mon'],$date['year']);
        $_SESSION['rows'] = $schedule_items;
        $data = [
            'title' => 'eZolar delivery browser',
        ];
        $this->view('Salesperson/delivery-schedule', $data);
    }





  }