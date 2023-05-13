<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/app/helpers/session_helper.php');

class EngineerReport extends Controller
{
    public function __construct()
    {
        $this->ReportModel = $this->model('EngineerReportModel');
    }

    private function getweekData($date){
      //date as a string in the format '2023-02-23'

      $dayOfWeek = date('N', strtotime($date)); // get the day of the week (1 for Monday, 7 for Sunday)

      $monday = date('Y-m-d', strtotime("-".($dayOfWeek - 1)." day", strtotime($date))); // calculate Monday of the week
      $sunday = date('Y-m-d', strtotime("+".(7 - $dayOfWeek)." day", strtotime($date))); // calculate Sunday of the week

      $weekData = array($monday, $sunday);

      return $weekData; 
  
    }

    private function getlastweekData($date){
      //date as a string in the format '2023-02-23'
      $dayOfWeek = date('N', strtotime($date)); // get the day of the week (1 for Monday, 7 for Sunday)

      $thisMonday = date('Y-m-d', strtotime("-".($dayOfWeek - 1)." day", strtotime($date))); // calculate Monday of the week
      $lastMonday = date('Y-m-d', strtotime("-7 day", strtotime($thisMonday))); // calculate last week's Monday
      $lastSunday = date('Y-m-d', strtotime("+6 day", strtotime($lastMonday))); // calculate last week's Sunday

      $weekData = array($lastMonday, $lastSunday); // store Monday and Sunday in an array
    }

    private function calculateChange($oldValue, $newValue) {
      if ($oldValue == 0) {
        if ($newValue == 0) {
          return 0; // no change
        } else {
          return INF; // infinite percentage change
        }
      }
    
      $change = $newValue - $oldValue; // calculate the difference between the two values
      $percentageChange = ($change / abs($oldValue)) * 100; // calculate the percentage change
    
      return round($percentageChange); // round the percentage change and return it as an integer
    }
    
    

    public function index()
    {
      $engID = $this->ReportModel->getUserID($_SESSION['user_email']);
      $_SESSION['inspection'] = array('current'=>$this->ReportModel->getweeksInspectionsofUser($this->getweekData(date('y-m-d')),$engID),
                                      'last'=>$this->ReportModel->getweeksInspectionsofUser($this->getweekData(date('y-m-d')),$engID));
      $_SESSION['inspection']['change'] = $this->calculateChange($_SESSION['inspection']['last'], (int)$_SESSION['inspection']['current']);
      $_SESSION['inspection']['average'] = round(($this->ReportModel->getweeksInspections($this->getweekData(date('y-m-d')))/$this->ReportModel->countEngineers()),1);

      $ModPacks = [];
      $ModPackTotals = [];
      $projectIDs = $this->ReportModel->getWeeksProjects($this->getweekData(date('y-m-d')),$engID);
      foreach ($projectIDs as $projectID){
        $projectID = $projectID->projectID;
        $modpack = $this->ReportModel->getModPack($projectID);
        $ModPacks[] = $modpack;
        $total = 0;
        foreach ($modpack['products'] as $product){
          $total += $product->cost*$product->productQuantity;
        }
        foreach ($modpack['extras'] as $extra){
          $total += $extra->price;
        }
        $ModPackTotals[] = array('projectID'=>$projectID,'total'=>$total);
      }

      $_SESSION['package'] = $ModPackTotals;
      $_SESSION['project'] = $ModPacks;
      
      $data = [
          'title' => 'eZolar Reports',
        ];
      $this->view('Engineer/reports', $data);
    }


}
