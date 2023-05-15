<?php
  class ProjectModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUserID($email){
      $this->db->query('SELECT UserID FROM user where email = :email');
      // $this->db->bind(':email', $email[0]);
      $row = $this->db->single(['email' => $email[0]]);
      return ($row -> UserID);
    }
    public function getUserRole($email){
      $this->db->query('SELECT type FROM user where email = :email');
      $row = $this->db->single(['email' => $email]);
      return ($row->type);
    }
    public function getAllProjects($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID AND status <> "F" AND status <> "Z0" Order by requestDate Desc');
      // $this->db->bind(':customerID', $id);

      // print_r($this->db->resultSet(['customerID' => $id]));die;
      $row = $this->db->resultSet(['customerID' => $id]);
      return $row;
    }
    public function getCancelledProjects($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID AND status = "F" Order by requestDate Desc');
      // $this->db->bind(':customerID', $id);

      // print_r($this->db->resultSet(['customerID' => $id]));die;
      $row = $this->db->resultSet(['customerID' => $id]);
      return $row;
    }
    public function getCompletedProjects($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID AND status = "Z0" Order by requestDate Desc');
      // $this->db->bind(':customerID', $id);

      // print_r($this->db->resultSet(['customerID' => $id]));die;
      $row = $this->db->resultSet(['customerID' => $id]);
      return $row;
    }

    public function newProject($data){
      // $userid  =($this->db->single());

    print_r($this->db->query('INSERT INTO project(`customerID`,`siteAddress`) VALUES (:customerID,:site)'));
    die;
      // $this->db->bind(':customerID', $data[0]);
      // $this->db->bind(':topic', $data[1]);
        
      // $this->db->execute();
      if($this->db->execute(['customerID'])){
        header('Location:/ezolar/project');
        // print_r("working");
        // die();
        return true;
      } else {
          return false;
      }
    }

    public function getFreeSalesPerson()
    {
      $this->db->query('SELECT employee.empID FROM employee
      LEFT JOIN project ON project.Salesperson_Employee_empID = employee.empID
      WHERE  project.Salesperson_Employee_empID IS NULL 
      AND employee.type = "Salesperson"');
  
      $row = $this->db->resultSet([]);
      if (empty($row)) {
        $this->db->query('SELECT employee.empID FROM project
        INNER JOIN employee ON project.Salesperson_Employee_empID = employee.empID 
        GROUP BY project.Salesperson_Employee_empID
        ORDER BY COUNT(project.Salesperson_Employee_empID) ASC');
    
        $row2 = $this->db->resultSet([]);
        return $row2[0]->empID;
      }
      else{
        return ($row[0]->empID);
      }

      

    }

    public function addNewRequest($userid,$data,$imgfile,$salesperson){
      // print_r('Hiii');die();
        $this->db->query('SELECT MAX(projectID) AS lastid FROM project');
        $row = $this->db->single([]);
        $old_id = $row->lastid;
        preg_match("/(.*?)(\d+)$/",$old_id,$matches);
        $new_id = $matches[1]. (str_pad($matches[2]+1,5,'0',STR_PAD_LEFT));
      //  print_r($new_id);die();
      

      $this->db->query('INSERT INTO project(`projectID`,`customerID`,`siteAddress`,`status`,`contactNo`,`Salesperson_Employee_empID`) VALUES (:projectID,:customerID,:siteAddress,:status,:contactNo,:salesperson)');
     $result1 = $this->db->execute(['customerID'=>$userid,'projectID'=>$new_id,'siteAddress'=>$data['location'],'contactNo'=>$data['mobile'],'status'=>"A1",'salesperson' =>$salesperson]);
      $this->db->query('INSERT INTO `paymentreceipt` ( `receiptPurpose`, `scan`, `Project_projectID`) VALUES (:receiptPurpose,:scan,:Project_projectID)');
     $result2 = $this->db->execute(['receiptPurpose'=>"Inspection",'Project_projectID'=>$new_id,'scan'=>$imgfile]);

     if ($result1 && $result2) {
      header('Location:/ezolar/project');
     }
     

       
    }
     public function getContractorProjects($id){
      $this->db->query('SELECT * FROM projectContractor INNER JOIN project ON projectContractor.Project_projectID = project.projectID where Contractor_contractorID = :userID Order by requestDate Desc');
      $row = $this->db->resultSet(['userID'=>$id]);
      return $row;

  }

   public function getContractorProjectsRequest($id){
      $this->db->query('SELECT * FROM scheduleitem_assignedcontr
      INNER JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedcontr.Scheduleitem_scheduleID
      INNER JOIN project ON scheduleitem.Project_projectID = project.projectID 
      WHERE scheduleitem_assignedcontr.contractorID = :userID 
      AND scheduleitem_assignedcontr.status = 0');
      $row = $this->db->resultSet(['userID'=>$id]);
      return $row;

  }

    // projects which assigned a salesperson
//    public function getSalespersonAssignedProjects($salespersonID){
//      $this->db->query('SELECT * FROM project WHERE Salesperson_Employee_empID = :salespersonID');
//      $row = $this->db->resultSet(['salespersonID'=>$salespersonID]);
//      return $row;
//  }


  public function SalespersonViewProjects(){
//      $this->db->query('SELECT * FROM project WHERE Salesperson_Employee_empID IS NULL');
      $this->db->query('SELECT * FROM project');
      $row = $this->db->resultSet([]);
      return $row;
  }

  public function salespersonAssignedProject($salespersonID,$projectID){
      $this->db->query('UPDATE project SET Salesperson_Employee_empID = :salespersonID WHERE projectID = :projectID');
      $this->db->execute(['salespersonID' => $salespersonID,'projectID' => $projectID]);
  }

  public function getProjectDetails($projectID){
      $this->db->query('SELECT * FROM project WHERE projectID = :projectID');
      $row = $this->db->resultSet(['projectID' => $projectID]);
      return $row;
  }

  public function getSchedule($projectID){
      $this->db->query('SELECT * FROM scheduleitem WHERE Project_projectID = :projectID AND type = :type');
      $row = $this->db->resultSet(['projectID' => $projectID,'type' => 'Inspection']);
      return $row;
  }

  public function getdSchedule($projectID){
    $this->db->query('SELECT * FROM scheduleitem WHERE Project_projectID = :projectID AND type = :type');
    $row = $this->db->resultSet(['projectID' => $projectID,'type' => 'Delivery']);
    return $row;
}

  public function getSalesPersonDetails($projectID){
      $this->db->query('SELECT * FROM project 
      INNER JOIN employee ON employee.empID = project.Salesperson_Employee_empID  
      LEFT JOIN employee_telno ON employee.empID = employee_telno.Employee_empID  
      INNER JOIN user ON employee.empID = user.userID
      WHERE project.projectID = :projectID');
      $row = $this->db->resultSet(['projectID' => $projectID]);
      return $row;
  }

  public function getContractorDetails($projectID){
    $this->db->query('SELECT * FROM projectcontractor 
    INNER JOIN contractor ON contractor.contractorID = projectcontractor.Contractor_contractorID  
    INNER JOIN employee_telno ON contractor.contractorID = employee_telno.Employee_empID  
    INNER JOIN user ON contractor.contractorID = user.userID
    WHERE projectcontractor.Project_projectID = :projectID');
    $row = $this->db->resultSet(['projectID' => $projectID]);
    return $row;
}


public function getEngineer($projectID){
  $this->db->query('SELECT * FROM projectengineer 
  INNER JOIN employee ON employee.empID = projectengineer.Engineer_empID  
  INNER JOIN employee_telno ON projectengineer.Engineer_empID = employee_telno.Employee_empID
  INNER JOIN user ON projectengineer.Engineer_empID = user.userID
  WHERE projectengineer.Project_projectID = :projectID');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  return $row;
}

public function getInspectionPayment($projectID){
  $this->db->query('SELECT * FROM paymentreceipt  
  WHERE Project_projectID = :projectID
  AND receiptPurpose = "Inspection"
  ');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  return $row;
}

public function addNewScheduleItem($projectID,$date1,$date2,$date3)
{
  $type = "Inspection";
  $this->db->query('INSERT INTO scheduleitem(`Project_projectID`,`type`) VALUES (:projectID,:type)');
  $result1 = $this->db->execute(['projectID' => $projectID,'type' => $type]);

  $this->db->query('SELECT * FROM scheduleitem  
  WHERE Project_projectID = :projectID
  AND type = "Inspection"
  ');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  
  $schedule_id = $row[0]->scheduleID;

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result2 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date1]);

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result3 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date2]);

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result4 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date3]); 

  $this->db->query('UPDATE project SET status = :status WHERE projectID = :projectID');
  $result5 = $this->db->execute(['status' => "B0",'projectID' => $projectID]);

  if($result1 && $result2 && $result3 && $result4 && $result5){
    return $schedule_id;
  }
  else {
    return false;
  }

}
public function getEngCount($projectID)
{
  $this->db->query('SELECT * FROM projectengineer  
      WHERE Project_projectID = :projectID
      ');
      $row = $this->db->resultSet(['projectID' => $projectID]);
      return $row;
}

public function getConCount($projectID)
{
  $this->db->query('SELECT * FROM projectcontractor  
      WHERE Project_projectID = :projectID
      ');
      $row = $this->db->resultSet(['projectID' => $projectID]);
      return $row;
}
public function getScheduleDetails($projectID)
{
  $type = "Inspection";
  $this->db->query('SELECT * FROM scheduleitem  
  WHERE Project_projectID = :projectID
  AND type = :type
  AND isConfirmed = 0
  ');
  $row = $this->db->resultSet(['projectID' => $projectID,'type' => $type]);
  if (empty($row)) {
    return -1;
  } else {
     $schedule_id = $row[0]->scheduleID;
     
      $this->db->query('SELECT COUNT(UserID) AS count_s FROM scheduleitem_assignedemp  
      WHERE ScheduleItem_scheduleID = :schedule
      AND status = 0
      ');
      $row = $this->db->resultSet(['schedule' => $schedule_id]);
      $count_s = $row[0]->count_s;
      if ($count_s < 1) {
        $this->db->query('SELECT UserID FROM scheduleitem_assignedemp  
        WHERE ScheduleItem_scheduleID = :schedule
        AND status = 1
        ');
        $row = $this->db->resultSet(['schedule' => $schedule_id]);
        if (empty($row)) {
          return -3;
        } else {
          return $row[0]->UserID;
        }
        
      } else {
        return -2;
      }
      

  }
  
  $schedule_id = $row[0]->scheduleID;

}

public function getDeliveryScheduleDetails($projectID)
{
  //this is for delivery details which is not confirmed
  $type = "Delivery";
  $this->db->query('SELECT * FROM scheduleitem  
  WHERE Project_projectID = :projectID
  AND type = :type
  AND isConfirmed = 0
  ');
  $row = $this->db->resultSet(['projectID' => $projectID,'type' => $type]);
  if (empty($row)) {
    return -1;
  } else {
     $schedule_id = $row[0]->scheduleID;
     
      $this->db->query('SELECT COUNT(contractorID) AS count_s FROM scheduleitem_assignedcontr  
      WHERE Scheduleitem_scheduleID = :schedule
      AND status = 0
      ');
      $row = $this->db->resultSet(['schedule' => $schedule_id]);
      $count_s = $row[0]->count_s;
      if ($count_s < 1) {
        $this->db->query('SELECT contractorID FROM scheduleitem_assignedcontr  
        WHERE Scheduleitem_scheduleID = :schedule
        AND status = 1
        ');
        $row = $this->db->resultSet(['schedule' => $schedule_id]);
        if (empty($row)) {
          return -3;
        } else {
          return $row[0]->contractorID;
        }
        
      } else {
        return -2;
      }
      

  }
  
  $schedule_id = $row[0]->scheduleID;

}

public function getScheduleDates($projectID)
{
  //this is for inspection
  $this->db->query('SELECT * FROM scheduleitem  
  WHERE Project_projectID = :projectID
  AND type = "Inspection"
  AND isConfirmed = 0
  ');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  
  $schedule_id = $row[0]->scheduleID;

  $this->db->query('SELECT requested_date FROM scheduleitem_requestdates  
  WHERE Scheduleitem_scheduleID = :scheduleID

  ');
  $row = $this->db->resultSet(['scheduleID' => $schedule_id]);
  return $row;


  
}

public function getDeliveryScheduleDates($projectID)
{
  //this is for delivery
  $this->db->query('SELECT * FROM scheduleitem  
  WHERE Project_projectID = :projectID
  AND type = "Delivery"
  AND isConfirmed = 0
  ');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  
  $schedule_id = $row[0]->scheduleID;

  $this->db->query('SELECT requested_date FROM scheduleitem_requestdates  
  WHERE Scheduleitem_scheduleID = :scheduleID

  ');
  $row = $this->db->resultSet(['scheduleID' => $schedule_id]);
  return $row;


  
}

public function checkEngineer($date){
  $this->db->query('SELECT employee.empID FROM employee
  LEFT JOIN scheduleitem_assignedemp ON scheduleitem_assignedemp.UserID = employee.empID
      LEFT JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID
      LEFT JOIN project ON project.projectID = scheduleitem.Project_projectID
      WHERE employee.empID NOT IN (SELECT employee.empID FROM employee
      INNER JOIN scheduleitem_assignedemp ON scheduleitem_assignedemp.UserID = employee.empID
      INNER JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID
      INNER JOIN project ON project.projectID = scheduleitem.Project_projectID
      WHERE (scheduleitem_assignedemp.status = 1 AND scheduleitem.date = :date) OR (scheduleitem_assignedemp.status = 2 AND scheduleitem.date = :date) )
      AND employee.type ="engineer" ');

      $row = $this->db->resultSet(['date'=>$date]);
      if (empty($row)) {
        $this->db->query('SELECT employee.empID FROM employee
        LEFT JOIN scheduleitem_assignedemp ON scheduleitem_assignedemp.UserID = employee.empID
        LEFT JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID
        LEFT JOIN project ON project.projectID = scheduleitem.Project_projectID
        WHERE employee.empID IN (SELECT employee.empID FROM employee
        INNER JOIN scheduleitem_assignedemp ON scheduleitem_assignedemp.UserID = employee.empID
        INNER JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID
        INNER JOIN project ON project.projectID = scheduleitem.Project_projectID
        WHERE scheduleitem_assignedemp.status = 1 AND scheduleitem.date = :date )
        AND employee.type ="engineer" ');

        $res = $this->db->resultSet(['date'=>$date]);
        $arr_count = count($res);
        for ($i=0; $i < $arr_count; $i++) { 
            $this->db->query('SELECT COUNT(scheduleitem_assignedemp.ScheduleItem_scheduleID) AS count_s FROM scheduleitem_assignedemp
            INNER JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID  
            WHERE scheduleitem_assignedemp.UserID = :userID
            AND scheduleitem.date = :date
            AND scheduleitem_assignedemp.Status = 1
            GROUP BY scheduleitem_assignedemp.UserID
            ');
            $res2 = $this->db->resultSet(['userID' => $row[$i]->empID,'date'=>$date]);
            if (empty($res2) || $res2->count_s < 4) {
              return $res[$i]->empID;
            }
        }
        return -1;
      } else {
        $selected = $row[0];
        $check_count = 0;
        $arr_count = count($row);
        for ($i=0; $i < $arr_count; $i++) { 
          if ($i == 0) {
            $this->db->query('SELECT COUNT(ScheduleItem_scheduleID) AS count_s FROM scheduleitem_assignedemp  
            WHERE UserID = :userID
            AND Status = 1
            GROUP BY UserID
            ');
            $res = $this->db->resultSet(['userID' => $row[$i]->empID]);
            if (empty($res)) {
              
              return $selected->empID;
            }
            else{
              $check_count = $res->count_s;
            }
          }
          else {
            $this->db->query('SELECT COUNT(ScheduleItem_scheduleID) AS count_s FROM scheduleitem_assignedemp  
            WHERE UserID = :userID
            AND Status = 1
            GROUP BY UserID
            ');
            $res = $this->db->resultSet(['userID' => $row[$i]->empID]);
            if (empty($res)) {
              return $row[$i]->empID;
            } else {
              // print_r($res[0]->count_s);
              if ($res[0]->count_s < $check_count  ) {
                $check_count = $res->count_s;
                $selected = $row[$i];
              }
            }
          }
        }
        
        return $selected->empID;
      
      }
      
      
  
}
public function addNewScheduleEng($schedule_id,$userid,$date)
{
  $this->db->query('UPDATE scheduleitem SET date = :date WHERE scheduleID = :scheduleID');
  $results = $this->db->execute(['date' => $date,'scheduleID' => $schedule_id]);

  $status = 0;

  $this->db->query('SELECT * FROM scheduleitem_assignedemp  
  WHERE ScheduleItem_scheduleID = :schedule_id
  AND UserID = :userid ');

  $result2 = $this->db->resultSet(['schedule_id' => $schedule_id,'userid' => $userid]);
  if (!empty($result2)){
    $this->db->query('UPDATE scheduleitem_assignedemp SET Status = :status WHERE ScheduleItem_scheduleID = :schedule_id AND UserID = :userid');
    $results = $this->db->execute(['status' => "0",'schedule_id' => $schedule_id,'userid' => $userid]);

  }else{
    $this->db->query('INSERT INTO scheduleitem_assignedemp(`ScheduleItem_scheduleID`,`UserID`,`Status`) VALUES (:schedule_id,:userid,:status)');
    $result1 = $this->db->execute(['schedule_id' => $schedule_id,'userid' => $userid,'status' => $status]);
    if ($result1) {
      return true;
    } else {
      return false;
    }
  }

  
  
}

public function addNewScheduleCon($schedule_id,$userid,$date)
{
  $this->db->query('UPDATE scheduleitem SET date = :date WHERE scheduleID = :scheduleID');
  $results = $this->db->execute(['date' => $date,'scheduleID' => $schedule_id]);

  $status = 0;

  $this->db->query('SELECT * FROM scheduleitem_assignedcontr  
  WHERE Scheduleitem_scheduleID = :schedule_id
  AND contractorID = :userid ');

  $result2 = $this->db->resultSet(['schedule_id' => $schedule_id,'userid' => $userid]);
  // print_r($result2);die();
  if (!empty($result2)){
    $this->db->query('UPDATE scheduleitem_assignedcontr SET Status = :status WHERE Scheduleitem_scheduleID = :schedule_id AND contractorID = :userid');
    $results = $this->db->execute(['status' => "0",'schedule_id' => $schedule_id,'userid' => $userid]);

  }else{
    $this->db->query('INSERT INTO scheduleitem_assignedcontr(`Scheduleitem_scheduleID`,`contractorID`,`status`) VALUES (:schedule_id,:userid,:status)');
    $result1 = $this->db->execute(['schedule_id' => $schedule_id,'userid' => $userid,'status' => $status]);
    if ($result1) {
      return true;
    } else {
      return false;
    }
  }

  
  
}

public function addEng($projectID,$userid)
{

  $this->db->query('INSERT INTO projectengineer(`Project_projectID`,`Engineer_empID`) VALUES (:projectID,:userid)');
  $result1 = $this->db->execute(['projectID' => $projectID,'userid' => $userid]);

  $this->db->query('UPDATE scheduleitem SET isConfirmed = :status WHERE Project_projectID = :projectID');
  $results = $this->db->execute(['status' => "1",'projectID' => $projectID]);

  $this->db->query('UPDATE project SET status = :status WHERE projectID = :projectID');
  $results = $this->db->execute(['status' => "C0",'projectID' => $projectID]);

  if ($result1) {
    return true;
  } else {
    return false;
  }
  
}

public function addCon($projectID,$userid)
{

  $this->db->query('INSERT INTO projectcontractor(`Project_projectID`,`Contractor_contractorID`) VALUES (:projectID,:userid)');
  $result1 = $this->db->execute(['projectID' => $projectID,'userid' => $userid]);

  $this->db->query('UPDATE scheduleitem SET isConfirmed = :status WHERE Project_projectID = :projectID');
  $results = $this->db->execute(['status' => "1",'projectID' => $projectID]);

  $this->db->query('UPDATE project SET status = :status WHERE projectID = :projectID');
  $results = $this->db->execute(['status' => "E0",'projectID' => $projectID]);

  if ($result1) {
    return true;
  } else {
    return false;
  }
  
}

public function rejectSchedule($schedule_id)
{
  //this is for engineer
  $this->db->query('UPDATE scheduleitem SET isConfirmed = :status WHERE scheduleID = :scheduleID');
  $results = $this->db->execute(['status' => "2",'scheduleID' => $schedule_id]);
}

public function addNewDeliveryScheduleItem($projectID,$date1,$date2,$date3)
{
  $type = "Delivery";
  $this->db->query('INSERT INTO scheduleitem (`Project_projectID`,`type`) VALUES (:projectID,:type)');
  $result1 = $this->db->execute(['projectID' => $projectID,'type' => $type]);

  $this->db->query('SELECT * FROM scheduleitem  
  WHERE Project_projectID = :projectID
  AND type = "Delivery"
  ');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  
  $schedule_id = $row[0]->scheduleID;

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result2 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date1]);

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result3 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date2]);

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result4 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date3]); 



  if($result1 && $result2 && $result3 && $result4 ){
    return $schedule_id;
  }
  else {
    return false;
  }

}
public function checkContractor($date){
  $this->db->query('SELECT employee.empID FROM employee
  LEFT JOIN scheduleitem_assignedcontr ON scheduleitem_assignedcontr.contractorID = employee.empID
      LEFT JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedcontr.Scheduleitem_scheduleID
      LEFT JOIN project ON project.projectID = scheduleitem.Project_projectID
      WHERE employee.empID NOT IN (SELECT employee.empID FROM employee
      INNER JOIN scheduleitem_assignedcontr ON scheduleitem_assignedcontr.contractorID = employee.empID
      INNER JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedcontr.Scheduleitem_scheduleID
      INNER JOIN project ON project.projectID = scheduleitem.Project_projectID
      WHERE (scheduleitem_assignedcontr.status = 1 AND scheduleitem.date = :date) OR (scheduleitem_assignedcontr.status = 2 AND scheduleitem.date = :date) )
      AND employee.type ="Contractor" ');

      $row = $this->db->resultSet(['date'=>$date]);
      if (empty($row)) {
        $this->db->query('SELECT employee.empID FROM employee
        LEFT JOIN scheduleitem_assignedcontr ON scheduleitem_assignedcontr.contractorID = employee.empID
        LEFT JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedcontr.Scheduleitem_scheduleID
        LEFT JOIN project ON project.projectID = scheduleitem.Project_projectID
        WHERE employee.empID IN (SELECT employee.empID FROM employee
        INNER JOIN scheduleitem_assignedcontr ON scheduleitem_assignedcontr.contractorID = employee.empID
        INNER JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedcontr.Scheduleitem_scheduleID
        INNER JOIN project ON project.projectID = scheduleitem.Project_projectID
        WHERE scheduleitem_assignedcontr.status = 1 AND scheduleitem.date = :date )
        AND employee.type ="Contractor" ');

        $res = $this->db->resultSet(['date'=>$date]);
        $arr_count = count($res);
        for ($i=0; $i < $arr_count; $i++) { 
            $this->db->query('SELECT COUNT(scheduleitem_assignedcontr.Scheduleitem_scheduleID) AS count_s FROM scheduleitem_assignedcontr
            INNER JOIN scheduleitem ON scheduleitem.scheduleID = scheduleitem_assignedcontr.Scheduleitem_scheduleID  
            WHERE scheduleitem_assignedcontr.contractorID = :userID
            AND scheduleitem.date = :date
            AND scheduleitem_assignedcontr.Status = 1
            GROUP BY scheduleitem_assignedcontr.contractorID
            ');
            $res2 = $this->db->resultSet(['userID' => $row[$i]->empID,'date'=>$date]);
            if (empty($res2) || $res2->count_s < 2) {
              
              return $res[$i]->empID;
            }
        }
        return -1;
      } else {
        $selected = $row[0];
        $check_count = 0;
        $arr_count = count($row);
        for ($i=0; $i < $arr_count; $i++) { 
          if ($i == 0) {
            $this->db->query('SELECT COUNT(Scheduleitem_scheduleID) AS count_s FROM scheduleitem_assignedcontr  
            WHERE contractorID = :userID
            AND Status = 1
            GROUP BY contractorID
            ');
            $res = $this->db->resultSet(['userID' => $row[$i]->empID]);
            if (empty($res)) {
              
              return $selected->empID;
            }
            else{
              $check_count = $res->count_s;
            }
          }
          else {
            $this->db->query('SELECT COUNT(Scheduleitem_scheduleID) AS count_s FROM scheduleitem_assignedcontr  
            WHERE contractorID = :userID
            AND Status = 1
            GROUP BY contractorID
            ');
            $res = $this->db->resultSet(['userID' => $row[$i]->empID]);
            if (empty($res)) {
              return $row[$i]->empID;
            } else {
              // print_r($res[0]->count_s);
              if ($res[0]->count_s < $check_count  ) {
                $check_count = $res->count_s;
                $selected = $row[$i];
              }
            }
          }
        }
        
        return $selected->empID;
      
      }
      
      
  
}

public function cancelProduct($projectID){
  //This function is for cancelling a project
  $this->db->query('UPDATE project SET status = :status WHERE projectID = :projectID');
  $result = $this->db->execute(['status' => "F",'projectID' => $projectID]);
  if($result){
    return true;
  }
  else {
    return false;
  }

}

public function confirmOrder($projectID,$filename){

  $this->db->query('INSERT INTO paymentreceipt(`receiptPurpose`,`scan`,`Project_projectID`) VALUES (:msg,:scan,:project)');
  $result2 = $this->db->execute(['scan' => $filename,'project' => $projectID, 'msg' => 'Order Confirmation']);


  $this->db->query('UPDATE project SET status = :status WHERE projectID = :projectID');
  $result = $this->db->execute(['status' => "D0",'projectID' => $projectID]);
  if($result && $result2){
    return true;
  }
  else {
    return false;
  }

}

public function getDeliveryPayment($projectID){
  $this->db->query('SELECT * FROM paymentreceipt  
  WHERE Project_projectID = :projectID
  AND receiptPurpose = "Order Confirmation"
  ');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  return $row;
}

public function UpdateScheduleItem($projectID,$date1,$date2,$date3)
{

  $this->db->query('SELECT * FROM scheduleitem  
  WHERE Project_projectID = :projectID
  AND type = "Inspection"
  ');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  
  $schedule_id = $row[0]->scheduleID;

  $this->db->query('DELETE FROM scheduleitem_requestdates WHERE Scheduleitem_scheduleID = :schedule_id;');
  $result1 = $this->db->execute(['schedule_id' => $schedule_id]);

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result2 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date1]);

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result3 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date2]);

  $this->db->query('INSERT INTO scheduleitem_requestdates(`Scheduleitem_scheduleID`,`requested_date`) VALUES (:schedule_id,:dates)');
  $result4 = $this->db->execute(['schedule_id' => $schedule_id,'dates' => $date3]);

  $this->db->query('UPDATE project SET status = :status WHERE projectID = :projectID');
  $result5 = $this->db->execute(['status' => "B0",'projectID' => $projectID]); 

  $this->db->query('UPDATE scheduleitem SET isConfirmed = :status WHERE Project_projectID = :projectID');
  $result6 = $this->db->execute(['status' => "0",'projectID' => $projectID]); 

  

  if($result1 && $result2 && $result3 && $result4 && $result5 && $result6){
    return true;
  }
  else {
    return false;
  }

}

public function getproduct($projectID){
  //this function will give the product ID and quantity of each product to make the suitable package after inspection.
    $this->db->query('SELECT * FROM modifiedpackage_product 
    INNER JOIN product ON product.productID = modifiedpackage_product.productID  
    WHERE modifiedpackage_product.projectID = :projectID');
    $row = $this->db->resultSet(['projectID' => $projectID]);
    return $row;
  


}

public function getproductname($projectID){
  //we need to use this function in order to get the product name to display in the view.
  $this->db->query('SELECT * FROM project 
  INNER JOIN package ON package.packageID =  project.Package_packageID
  WHERE project.projectID = :projectID');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  return $row;
}

public function getProjectDetailsCustomer($projectID){
  $this->db->query('SELECT * FROM project
  INNER JOIN customer ON customer.customerID = project.customerID 
  WHERE project.projectID = :projectID');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  return $row;
}

public function markAsComplete($projectID){
  //this function will mark the project as complete and will change the status of the project to Z0 (contractor completed)
  $this->db->query('UPDATE scheduleitem SET isCompleted = :status WHERE Project_projectID = :projectID');
  $result = $this->db->execute(['status' => "1",'projectID' => $projectID]);

   $this->db->query('UPDATE project SET status = :status WHERE projectID = :projectID');
  $result2 = $this->db->execute(['status' => "Z0",'projectID' => $projectID]);
  if($result & $result2){
    return true;
  }
  else {
    return false;
  }
}

public function getScheduleItems($userID,$month,$year){
        //this function will get the schedule items for the customer
        $this->db->query('SELECT * FROM scheduleitem  inner join project on project.projectID = scheduleitem.Project_projectID  where project.customerID	 = :userID AND scheduleitem.isConfirmed = 1 AND scheduleitem.date >= :startDate AND scheduleitem.date <= :endDate');

        $start = $year.'-'.str_pad(strval($month),2,'0',STR_PAD_LEFT).'-01';
        $end = $year.'-'.str_pad(strval($month+1),2,'0',STR_PAD_LEFT).'-01';
        
        $rows = $this->db->resultSet(['userID' => $userID, 'startDate' => $start, 'endDate' => $end]);
        return ($rows);
    }

public function rejectScheduleCon($scheduleID,$con_id)
{
  //this function will reject the schedule item for the contractor
  $this->db->query('UPDATE scheduleitem_assignedcontr SET status = 2 
  WHERE Scheduleitem_scheduleID = :scheduleID
  AND contractorID = :con_id');
  $row =$this->db->execute(['scheduleID' => $scheduleID,'con_id' => $con_id]);
  if ($row) {
    return true;
  } else {
   return false;
  }
  
}

public function acceptScheduleCon($scheduleID,$con_id)
{
  //this function will accept the schedule item for the contractor
  $this->db->query('UPDATE scheduleitem_assignedcontr SET status = 1 
  WHERE Scheduleitem_scheduleID = :scheduleID
  AND contractorID = :con_id');
  $row =$this->db->execute(['scheduleID' => $scheduleID,'con_id' => $con_id]);
  if ($row) {
    return true;
  } else {
   return false;
  }
  
}

public function getExtraItems($projectID){
  //we will add the extra items to the modified package table and then we will use this function to get the extra items to display in the view.
  $this->db->query('SELECT * FROM `modifiedpackage_extra` 
  WHERE projectID = :projectID');
  $row=$this->db->resultSet(['projectID'=>$projectID]);
  return $row;
  }


  //this function is used to get the project details of a completed projects of the given contractor
  public function getReport($cont_id)
    {
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $months[date('Y-m', strtotime("-$i months"))] = 0;
        }
        $this->db->query('SELECT COUNT(*) as count, scheduleitem.date FROM `project` 
        INNER JOIN scheduleitem ON scheduleitem.Project_projectID = project.projectID 
        INNER JOIN projectcontractor ON projectcontractor.Project_projectID = project.projectID 
        WHERE projectcontractor.Contractor_contractorID = :Contractor_contractorID
        AND project.status = :status
        AND scheduleitem.type = :delivery
        AND scheduleitem.isCompleted = :isconf
        GROUP BY MONTH(scheduleitem.date),YEAR(scheduleitem.date)');
        $com_pro=$this->db->resultSet(['Contractor_contractorID' => $cont_id,'status' => "Z0",'delivery' => "Delivery",'isconf' => "1"]);
        
        foreach ($com_pro as $row) {
          // print_r( $row);die();
            $year_month = date('Y-m', strtotime($row->date));
            if (array_key_exists($year_month, $months)) {
                $months[$year_month] += $row->count;
            }
        }
        //Rename the key of the array to month plus year 
        $months = array_combine(array_map(function ($key) {
            return date('F Y', strtotime($key));
        }, array_keys($months)), array_values($months));

        //Reverse the array to show the earliest month first
        $months = array_reverse($months);
        // print_r($months);die();
        return $months;
    }


    //this function is used to get the details of projects by eZolar
    public function getReport2()
    {
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $months[date('Y-m', strtotime("-$i months"))] = 0;
        }
        $this->db->query('SELECT COUNT(*) as count, requestDate FROM `project` 
        GROUP BY MONTH(requestDate),YEAR(requestDate)');
        $com_pro=$this->db->resultSet([]);
        
        foreach ($com_pro as $row) {
          // print_r( $row);die();
            $year_month = date('Y-m', strtotime($row->requestDate));
            if (array_key_exists($year_month, $months)) {
                $months[$year_month] += $row->count;
            }
        }
        //Rename the key of the array to month plus year 
        $months = array_combine(array_map(function ($key) {
            return date('F Y', strtotime($key));
        }, array_keys($months)), array_values($months));

        //Reverse the array to show the earliest month first
        $months = array_reverse($months);
        // print_r($months);die();
        return $months;
    }


    //to get all troubleshoot details of that customer
    public function getTroubleshootReq($userID){
      $this->db->query('SELECT * FROM scheduleitem  inner join project on project.projectID = scheduleitem.Project_projectID  where project.customerID = :userID AND scheduleitem.type = :type');
      $row = $this->db->resultSet(['userID' => $userID,'type' => "Troubleshoot"]);
      return $row;
    }

    //this function is to get troubleshoot details of a particular project
    public function getTroubleshootDetails($projectID){
      $this->db->query('SELECT * FROM scheduleitem  inner join project on project.projectID = scheduleitem.Project_projectID  where project.projectID = :projectID AND scheduleitem.type = :type');
      $row = $this->db->resultSet(['projectID' => $projectID,'type' => "Troubleshoot"]);
      return $row;
    }

    //get troubleshoot engineer from scheduleitem_assigned Engineer and employee table
    public function getTroubleshootEngineer($scheduleID){
      $this->db->query('SELECT * FROM scheduleitem_assignedemp  inner join employee on employee.empID = scheduleitem_assignedemp.UserID  where scheduleitem_assignedemp.Scheduleitem_scheduleID = :scheduleID');
      $row = $this->db->resultSet(['scheduleID' => $scheduleID]);
      return $row;
    }

}


?>