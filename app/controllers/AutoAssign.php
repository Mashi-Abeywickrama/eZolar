<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));

  class AutoAssign extends Controller {
    
    public function __construct(){ 
        $this->AutoAssignModel = $this->model('AutoAssignModel');
    }

    private function getweekData($date){
      //date as a string in the format '2023-02-23'

      $year = (int)substr($date,0,4);
      $month = (int)substr($date,5,2);
      $day = (int)substr($date,8,2);

      $fdate = new DateTime();
      $fdate->setdate($year,$month,$day);

      $dayinweek = $fdate->format('N'); //0 for monday, 6 for sunday
      
      $weekStartDay = $day+1-$dayinweek;
      $weekStartMonth = $month;
      $weekStartYear = $year;
      if ($weekStartDay <=0){
        $weekStartMonth -= 1;
        if ($weekStartMonth<=0){
          $weekStartYear -=1;
          $weekStartMonth = 12;
        }
        $fdate->setdate($weekStartYear,$weekStartMonth,1);
        $weekStartDay += $fdate->format('t');
      }
      $output = array(strval($weekStartYear).'-'.str_pad(strval($weekStartMonth),2,'0',STR_PAD_LEFT).'-'.str_pad(strval($weekStartDay),2,'0',STR_PAD_LEFT));
      
      $weekEndDay = $weekStartDay+6;
      $weekEndMonth = $weekStartMonth; //line 37:39 are unecessary, kept to increase human readability.
      $weekEndYear = $weekStartYear;
      $fdate->setdate($weekEndYear,$weekEndMonth,1);
      if ($weekEndDay > (int)$fdate->format('t')){
        $weekEndMonth += 1;
        if($weekEndMonth > 12){
          $weekEndYear += 1;
          $weekEndMonth = 1;
        }
        $weekEndDay = $weekEndDay-(int)$fdate->format('t');
      }
      $output[] = strval($weekEndYear).'-'.str_pad(strval($weekEndMonth),2,'0',STR_PAD_LEFT).'-'.str_pad(strval($weekEndDay),2,'0',STR_PAD_LEFT);

      return $output;

    }
    

    public function engAssign($data){
      //data should be passed in with base64_encode(serialize($input)) from the relavant controller.
      //here input should be in the format of (Assoc Array) ['projectID'] => project id, ['dates']=> array of dates dates are in string format (eg:- 2023-04-29), ['returnLink'] => url for redirect function;

      $data = unserialize(base64_decode($data));
      if ((!array_key_exists('projectID',$data)) || (!array_key_exists('returnLink',$data)) || (!array_key_exists('dates',$data))){
        redirect('');
        return;
      }

      $prjStatus = $this->AutoAssignModel->getProjectStatus($data['projectID']);
      if ($prjStatus != 'B0'){
        redirect(''); //TODO setup error page
        return;
      }

      $dateFixed = FALSE;
      foreach($data['dates'] as $date){
        $weekdata = $this->getweekData($date);
        $engList = $this->AutoAssignModel->getEngineerList($weekdata[0],$weekdata[1]);
        foreach ($engList as $eng){
          $engWorkCount = $this->AutoAssignModel->getEngineerSchedule($date,$eng->EngineerID);
          if ((int)$engWorkCount < 3){
            $scheduleData = array($data['projectID'],$eng->EngineerID,$date);
            $this->AutoAssignModel->assignInspectionEngineer($scheduleData);
            $dateFixed = TRUE;
            break;
          }
        }
        if($dateFixed){
          break;
        }
      }

      if ($dateFixed){
        redirect($data['returnLink']);
      }
      else{
        redirect('');
      }

    }

    public function contrAssign($data){
      //data should be passed in with base64_encode(serialize($input)) from the relavant controller.
      //here input should be in the format of (Assoc Array) ['projectID'] => project id, ['dates']=> array of dates dates are in string format (eg:- 2023-04-29), ['returnLink'] => url for redirect function;

      $data = unserialize(base64_decode($data));
      if ((!array_key_exists('projectID',$data)) || (!array_key_exists('returnLink',$data)) || (!array_key_exists('dates',$data))){
        redirect('');
        return;
      }

      $prjStatus = $this->AutoAssignModel->getProjectStatus($data['projectID']);
      if ($prjStatus != 'D1'){
        redirect(''); //setup error page
        return;
      }

      $dateFixed = FALSE;
      foreach($data['dates'] as $date){
        $weekdata = $this->getweekData($date);
        $contrList = $this->AutoAssignModel->getConractorList($weekdata[0],$weekdata[1]);
        foreach ($contrList as $contr){
          $contrWorkCount = $this->AutoAssignModel->getContractorSchedule($date,$contr->contractorID);
          if ((int)$contrWorkCount < 1){
            $scheduleData = array($data['projectID'],$contr->contractorID,$date);
            $this->AutoAssignModel->assignInspectionContractor($scheduleData);
            $dateFixed = TRUE;
            break;
          }
        }
        if($dateFixed){
          break;
        }
      }

      if ($dateFixed){
        redirect($data['returnLink']);
      }
      else{
        redirect('');//setup error page
      }

    }
    public function spProjectAssign($data){
      //data should be passed in with base64_encode(serialize($input)) from the relavant controller.
      //here input should be in the format of (Assoc Array) ['projectID'] => project id, ['returnLink'] => url for redirect function;

      $data = unserialize(base64_decode($data));
      if ((!array_key_exists('projectID',$data)) || (!array_key_exists('returnLink',$data))){
        redirect('');
        return;
      }

      if ($this->AutoAssignModel->checkProjectHasSP($data['projectID'])==1){
        redirect('');
      } else {
        $spList = $this->AutoAssignModel->getSPList();
        $this->AutoAssignModel->assignSP($data['projectID'],$spList[0]->Employee_empID);
        redirect($data['returnLink']);
      }
    }

  }