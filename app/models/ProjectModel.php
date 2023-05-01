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
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID AND status <> "F" AND status <> "E0"');
      // $this->db->bind(':customerID', $id);

      // print_r($this->db->resultSet(['customerID' => $id]));die;
      $row = $this->db->resultSet(['customerID' => $id]);
      return $row;
    }
    public function getCancelledProjects($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID AND status = "F"');
      // $this->db->bind(':customerID', $id);

      // print_r($this->db->resultSet(['customerID' => $id]));die;
      $row = $this->db->resultSet(['customerID' => $id]);
      return $row;
    }
    public function getCompletedProjects($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID AND status = "E0"');
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

    public function addNewRequest($userid,$data,$imgfile){
      // print_r('Hiii');die();
        $this->db->query('SELECT MAX(projectID) AS lastid FROM project');
        $row = $this->db->single([]);
        $old_id = $row->lastid;
        preg_match("/(.*?)(\d+)$/",$old_id,$matches);
        $new_id = $matches[1]. (str_pad($matches[2]+1,5,'0',STR_PAD_LEFT));
      //  print_r($new_id);die();
      

      $this->db->query('INSERT INTO project(`projectID`,`customerID`,`siteAddress`,`status`,`contactNo`) VALUES (:projectID,:customerID,:siteAddress,:status,:contactNo)');
     $result1 = $this->db->execute(['customerID'=>$userid,'projectID'=>$new_id,'siteAddress'=>$data['location'],'contactNo'=>$data['mobile'],'status'=>"A0"]);
      $this->db->query('INSERT INTO `paymentreceipt` ( `receiptPurpose`, `scan`, `Project_projectID`) VALUES (:receiptPurpose,:scan,:Project_projectID)');
     $result2 = $this->db->execute(['receiptPurpose'=>"Inspection",'Project_projectID'=>$new_id,'scan'=>$imgfile]);

     if ($result1 && $result2) {
      header('Location:/ezolar/project');
     }
     

       
    }
     public function getContractorProjects($id){
      $this->db->query('SELECT * FROM projectContractor INNER JOIN project ON projectContractor.Project_projectID = project.projectID where Contractor_contractorID = :userID');
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
      INNER JOIN employee_telno ON employee.empID = employee_telno.Employee_empID  
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
    return true;
  }
  else {
    return false;
  }

}

public function addNewDeliveryScheduleItem($projectID,$date1,$date2,$date3)
{
  $type = "Delivery";
  $this->db->query('INSERT INTO scheduleitem(`Project_projectID`,`type`) VALUES (:projectID,:type)');
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
    return true;
  }
  else {
    return false;
  }

}

public function cancelProduct($projectID){
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
  $this->db->query('SELECT * FROM project 
  WHERE projectID = :projectID');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  
  $packageID = $row[0]->Package_packageID;

  $this->db->query('SELECT count(productID) AS pcount FROM modifiedpackage_product 
  WHERE projectID = :projectID
  ');
  $res = $this->db->resultSet(['projectID' => $projectID]);
  // print_r($res[0]->pcount);die();

  if ($res[0]->pcount > 0) {
    $this->db->query('SELECT * FROM modifiedpackage_product 
    INNER JOIN product ON product.productID = modifiedpackage_product.projectID  
    WHERE modifiedpackage_product.projectID = :projectID');
    $row = $this->db->resultSet(['projectID' => $projectID]);
    return $row;
  
  } else {
    $this->db->query('SELECT * FROM package_product 
    INNER JOIN product ON product.productID = package_product.Product_productID  
    WHERE package_product.Package_packageID = :packageID');
    $row = $this->db->resultSet(['packageID' => $packageID]);
    return $row;
  
  }
  





}

public function getProjectDetailsCustomer($projectID){
  $this->db->query('SELECT * FROM project
  INNER JOIN customer ON customer.customerID = project.customerID 
  WHERE project.projectID = :projectID');
  $row = $this->db->resultSet(['projectID' => $projectID]);
  return $row;
}

public function markAsComplete($projectID){
  $this->db->query('UPDATE scheduleitem SET isCompleted = :status WHERE Project_projectID = :projectID');
  $result = $this->db->execute(['status' => "1",'projectID' => $projectID]);
  if($result){
    return true;
  }
  else {
    return false;
  }
}

  }
?>