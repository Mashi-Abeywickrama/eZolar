<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/app/helpers/session_helper.php');

class SalespersonReports extends Controller
{
    public function __construct()
    {
        $this->statisticsModel = $this->model('statisticsModel');
    }

    public function index(){
        if (!isLoggedIn()) {
            redirect('login');
        }

        $current_date = date('Y-m-d');
        $date = $current_date;
        $salesperson_Id = $this->statisticsModel->getUserID([$_SESSION['user_email']]);
        

        $weeks = [];
        $messageCount = [];
        for ($i = 7; $i >= 0; $i--) {
            $weeks[$i] = $this->week($date);
            $date = date('Y-m-d',strtotime("-7 day",strtotime($date)));
            $messageCount[$i] = $this->statisticsModel->salespersonInteraction($salesperson_Id,$this->week($date));
          }
          $weeks = array_reverse($weeks);
          $messageCount = array_reverse($messageCount);
          $_SESSION['message_count'] = $messageCount;
          $_SESSION['weeks'] = $weeks;
        $data = [
          'title' => 'Salesperson reports',
        ];
        $this->view('Salesperson/reports', $data);
    }

    private function week($date){
        $dayOfWeek = date('N',strtotime($date));

        $monday = date('Y-m-d', strtotime("-".($dayOfWeek - 1)." day", strtotime($date))); // calculate Monday of the week
        $sunday = date('Y-m-d', strtotime("+".(7 - $dayOfWeek)." day", strtotime($date))); // calculate Sunday of the week

        $weekData = array($monday, $sunday);

        return $weekData;
    }


}
