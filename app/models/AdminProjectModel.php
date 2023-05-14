<?php
  class AdminProjectModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUserID($email){
      $this->db->query('SELECT UserID FROM user where email = :email');
      $row = $this->db->single(['email' => $email[0]]);
      return ($row -> UserID);
    }
    public function getUserRole($email){
      $this->db->query('SELECT type FROM user where email = :email');
      $row = $this->db->single(['email' => $email]);
      return ($row->type);
    }
    public function getProjects(){
      $this->db->query('SELECT * FROM project');
      $row = $this->db->resultSet([]);
      return $row;
    }
    public function getCancelledProjects($id){
      $this->db->query('SELECT * FROM project WHERE status = "F"');
      $row = $this->db->resultSet([]);
      return $row;
    }
    public function getCompletedProjects($id){
      $this->db->query('SELECT * FROM project WHERE status = "Z0"');
      $row = $this->db->resultSet(['SPID' => $id]);
      return $row;
    }
    public function getAssignedProjectDetails($prj_ID){
      $this->db->query('SELECT * FROM project
      INNER JOIN customer ON project.customerID = customer.customerID 
      WHERE projectID = :prjID');
      $row = $this->db->single(['prjID' => $prj_ID]);
      return $row;
    }
    public function getAssignedDates($prjID,$type){
      $this->db->query('SELECT `scheduleID`,`date` from `scheduleitem` WHERE Project_projectID = :projectID AND `type` = :SItype');
      $rows = $this->db->resultSet(['projectID' => $prjID, 'SItype' => $type]);
      return $rows;
    }

    public function checkSchduleConfirmed($schdID){
      $this->db->query('SELECT `isConfirmed` from `scheduleitem` WHERE scheduleID  = :scheduleID;');
      $row = $this->db->single(['scheduleID' => $schdID]);
      return ($row->isConfirmed);
    }

    public function checkModifiedPackage($prjID){
      $this->db->query('SELECT count(projectID) as Count from `modifiedpackage` WHERE projectID = :prjID;');
      $count = $this->db->single(['prjID' => $prjID])->Count;
      return (int)$count;
    }

    public function getAllPaymentReceipts($projectID){
      $this->db->query('SELECT * from `paymentreceipt` WHERE Project_projectID = :projectID;');
      $rows = $this->db->resultSet(['projectID' => $projectID]);
      return $rows;
    }

    // public function checkUnverifiedReceipt($projectID){
    //   $this->db->query('SELECT count(receiptID) as Count from `paymentreceipt` WHERE Project_projectID = :prjID AND isVerified = 0;');
    //   $count = $this->db->single(['prjID' => $projectID])->Count;
    //   return (int)$count;
    // }

    // public function getReceiptfromProject($projectID){
    //   $this->db->query('SELECT * from `paymentreceipt` WHERE Project_projectID = :projectID AND isVerified = 0;');
    //   $row = $this->db->single(['projectID' => $projectID]);
    //   return $row;
    // }

    public function getReceipt($receiptID){
      $this->db->query('SELECT * from `paymentreceipt` WHERE receiptID = :receiptID;');
      $row = $this->db->single(['receiptID' => $receiptID]);
      return $row;
    }

    // public function verifyReceipt($receiptID){
    //   $this->db->query('UPDATE `paymentreceipt` SET isVerified = 1 WHERE receiptID = :receiptID;');
    //   $this->db->execute(['receiptID' => $receiptID]);
    // }

    // public function rejectReceipt($receiptID){
    //   $this->db->query('UPDATE `paymentreceipt` SET isVerified = -1 WHERE receiptID = :receiptID;');
    //   $this->db->execute(['receiptID' => $receiptID]);
    // }

    // public function advanceProject($prjID,$status){
    //   $this->db->query('UPDATE `project` SET `status` = :status WHERE projectID  = :projectID;');
    //   $this->db->execute(['projectID'=>$prjID,'status'=> $status]);
    // }
    // public function addVerifyDate($receiptID){
    //   $date = Date('y-m-d');
    //   $this->db->query('UPDATE `paymentreceipt` SET verifiedDate =  :cdate WHERE receiptID = :receiptID;');
    //   $this->db->execute(['receiptID' => $receiptID, 'cdate' =>$date]);
    // }

    public function getEngName($prjID){
      $this->db->query('SELECT `name` FROM `employee` INNER JOIN scheduleitem_assignedemp ON UserID = empID INNER JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID WHERE Project_projectID = :prjID GROUP BY empID;');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function getContrName($prjID){
      $this->db->query('SELECT `name` FROM `employee` INNER JOIN scheduleitem_assignedcontr ON contractorID = empID INNER JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID WHERE Project_projectID = :prjID GROUP BY empID;');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function getSalesPresonName($prjID){
      $this->db->query('SELECT `name` FROM `employee` INNER JOIN project ON Salesperson_Employee_empID = empID WHERE projectID = :prjID GROUP BY empID');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function getPaymentHistory($prjID){
      $this->db->query('SELECT * FROM `paymentreceipt` WHERE Project_projectID = :prjID ORDER BY verifiedDate DESC;');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function getSalesperson($prjID){
      $this->db->query('SELECT * FROM `employee` INNER JOIN project ON Salesperson_Employee_empID = empID WHERE projectID = :prjID GROUP BY empID');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function getEngineer($prjID){
      $this->db->query('SELECT * FROM `employee` INNER JOIN projectengineer ON Engineer_empID = empID WHERE Project_projectID = :prjID');
      // $this->db->query('SELECT * FROM `employee` INNER JOIN projectengineer ON Engineer_empID = empID WHERE Project_projectID = :prjID');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function getContractor($prjID){
      $this->db->query('SELECT * FROM `employee` INNER JOIN projectcontractor ON Contractor_contractorID = empID WHERE Project_projectID = :prjID GROUP BY empID');
      // $this->db->query('SELECT * FROM `employee` INNER JOIN scheduleitem_assignedcontr ON contractorID = empID INNER JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID WHERE Project_projectID = :prjID GROUP BY empID');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function getAllSalesperson(){
      $this->db->query('SELECT * FROM `employee` WHERE type="Salesperson"');
      $rows = $this->db->resultSet([]);
      return $rows;
    }

    public function getAllEngineers(){
      $this->db->query('SELECT * FROM `employee` WHERE type="Engineer"');
      $rows = $this->db->resultSet([]);
      return $rows;
    }

    public function getAllContractors(){
      $this->db->query('SELECT * FROM `employee` WHERE type="Contractor"');
      $rows = $this->db->resultSet([]);
      return $rows;
    }

    public function reAssignSalesperson($prjID,$empID){
      $this->db->query('UPDATE project SET Salesperson_Employee_empID = :empID WHERE projectID = :prjID');
      $this->db->execute(['prjID' => $prjID,'empID' => $empID]);
    }

    public function reAssignEngineer($prjID,$empID){
      $this->db->query('UPDATE projectengineer SET Engineer_empID = :empID WHERE Project_projectID = :prjID');
      $this->db->execute(['prjID' => $prjID,'empID' => $empID]);
    }

    public function reAssignContractor($prjID,$empID){
      $this->db->query('UPDATE projectcontractor SET Contractor_contractorID = :empID WHERE Project_projectID = :prjID');
      $this->db->execute(['prjID' => $prjID,'empID' => $empID]);
    }
    
  }