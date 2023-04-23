<?php
  class AutoAssignModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getProjectStatus($prjID){
      $this->db->query('SELECT `status` FROM project WHERE projectID = :projectID;');
      $results = $this->db->single(['projectID'=>$prjID]);
      return $results->status;
    }

    public function getEngineerList($start,$end){
      $this->db->query('SELECT EngineerID, COUNT(scheduleID) as Count FROM Engineer LEFT JOIN `scheduleitem_assignedemp` ON EngineerID = UserID LEFT JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID AND scheduleitem.date >= :startDate AND scheduleitem.date <= :endDate GROUP BY UserID ORDER BY COUNT(scheduleID) ASC;');
      $results = $this->db->resultSet(['startDate' => $start,'endDate'=>$end]);
      return $results;
    }

    public function getEngineerSchedule($date,$engID){
      $this->db->query('SELECT count(ScheduleItem_scheduleID) as Count FROM scheduleitem_assignedemp inner join scheduleitem on scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID  where  scheduleitem.date = :sDate AND UserID= :engID');
      $results = $this->db->single(['sDate' => $date,'engID'=>$engID]);
      return $results->Count;
    }

    public function checkPrjEngAssigned($prjID,$engID){
      $this->db->query('SELECT COUNT(Project_projectID) AS Count FROM projectengineer WHERE Project_projectID = :prjID AND Engineer_empID= :engID');
      $result = $this->db->single(['prjID'=>$prjID,'engID'=>$engID])->Count;
      if ((int)$result != 0){
        return TRUE;
      } else {
        return FALSE;
      }

    }

    public function assignInspectionEngineer($data){ //format of data=[prjID,engID,date]
      if(!$this->checkPrjEngAssigned($data[0],$data[1])){
        $this->db->query('INSERT INTO projectengineer VALUES (:prjID,:engID);');
        $this->db->execute(['prjID'=>$data[0],'engID'=>$data[1]]);
      }
      $this->db->query('INSERT INTO scheduleitem (Project_projectID,`type`,`date`) VALUES (:prjID,"Inspection",:sdate);');
      $this->db->execute(['prjID'=>$data[0],'sdate'=>$data[2]]);
      $this->db->query('SELECT scheduleID FROM scheduleitem WHERE Project_projectID = :prjID AND `date` = :sdate; ');
      $schedulID = $this->db->single(['prjID'=>$data[0],'sdate'=>$data[2]])->scheduleID;
      $this->db->query('INSERT INTO scheduleitem_assignedemp VALUES (:schID,:engID);');
      $this->db->execute(['schID'=>$schedulID,'engID'=>$data[1]]);
    }


    public function getConractorList($start,$end){
      $this->db->query('SELECT contractor.contractorID, COUNT(scheduleID) as Count FROM contractor LEFT JOIN `scheduleitem_assignedcontr` ON contractor.contractorID = scheduleitem_assignedcontr.contractorID LEFT JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID AND scheduleitem.date >= :startDate AND scheduleitem.date <= :endDate GROUP BY contractor.contractorID ORDER BY COUNT(scheduleID) ASC;');
      $results = $this->db->resultSet(['startDate' => $start,'endDate'=>$end]);
      return $results;
    }

    public function getContractorSchedule($date,$contrID){
      $this->db->query('SELECT count(ScheduleItem_scheduleID) as Count FROM scheduleitem_assignedcontr inner join scheduleitem on scheduleitem.scheduleID = scheduleitem_assignedcontr.ScheduleItem_scheduleID  where  scheduleitem.date = :sDate AND contractorID= :contrID');
      $results = $this->db->single(['sDate' => $date,'contrID'=>$contrID]);
      return $results->Count;
    }

    public function checkPrjContrAssigned($prjID,$contrID){
      $this->db->query('SELECT COUNT(Project_projectID) AS Count FROM projectcontractor WHERE Project_projectID = :prjID AND Contractor_contractorID= :contrID');
      $result = $this->db->single(['prjID'=>$prjID,'contrID'=>$contrID])->Count;
      if ((int)$result != 0){
        return TRUE;
      } else {
        return FALSE;
      }

    }

    public function getprojectEngineers($prjID){
      $this->db->query('SELECT Engineer_empID FROM projectengineer WHERE Project_projectID = :prjID;');
      $results = $this->db->resultSet(['prjID'=>$prjID]);
      return $results;
    }

    public function assignInspectionContractor($data){ //format of data=[prjID,contrID,date]
      if(!$this->checkPrjContrAssigned($data[0],$data[1])){
        $this->db->query('INSERT INTO projectcontractor VALUES (:prjID,:contrID);');
        $this->db->execute(['prjID'=>$data[0],'contrID'=>$data[1]]);
      }
      $this->db->query('INSERT INTO scheduleitem (Project_projectID,`type`,`date`) VALUES (:prjID,"Delivery",:sdate);');
      $this->db->execute(['prjID'=>$data[0],'sdate'=>$data[2]]);
      $this->db->query('SELECT scheduleID FROM scheduleitem WHERE Project_projectID = :prjID AND `date` = :sdate; ');
      $schedulID = $this->db->single(['prjID'=>$data[0],'sdate'=>$data[2]])->scheduleID;
      $engList = $this->getprojectEngineers($data[0]);
      foreach($engList as $eng)
      {  
        $this->db->query('INSERT INTO scheduleitem_assignedemp VALUES (:schID,:engID);');
        $this->db->execute(['schID'=>$schedulID,'engID'=>$eng->Engineer_empID]);
      }
      $this->db->query('INSERT INTO scheduleitem_assignedcontr VALUES (:schID,:contrID)');
      $this->db->execute(['schID'=>$schedulID,'contrID'=>$data[1]]);
    }

    public function getSPList(){
      $this->db->query('SELECT Employee_empID, COUNT(projectID) AS Count FROM `salesperson` LEFT JOIN project ON Salesperson_Employee_empID = salesperson.Employee_empID AND project.status != "F3" GROUP BY salesperson.Employee_empID ORDER BY COUNT(projectID) ASC;');
      $results = $this->db->resultset([]);
      return $results;  
    }

    public function checkProjectHasSP($prjID){
      $this->db->query('SELECT CASE WHEN Salesperson_Employee_empID IS NULL THEN 0 ELSE 1 END as outp FROM project WHERE projectID = :prjID;');
      $result = $this->db->single(['prjID'=>$prjID]);
      return $result->outp;
    }

    public function assignSP($prjID,$SPID){
      $this->db->query('UPDATE project SET Salesperson_Employee_empID = :SPID WHERE projectID = :prjID;');
      $this->db->execute(['prjID'=>$prjID,'SPID'=>$SPID]);
    }


    

  }
?>