<?php
  class EngineerProjectModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUserID($email){
      $this->db->query('SELECT UserID FROM user where email = :email');
      $row = $this->db->single(['email' => $email[0]]);
      return ($row -> UserID);
    }

    public function getAssignedProjects($id){
     
      $this->db->query('SELECT * FROM projectengineer INNER JOIN project ON projectengineer.Project_projectID = project.projectID WHERE  Engineer_empID = :engID');
      $row = $this->db->resultSet(['engID' => $id]);
      return $row;
    }

    public function getNewAssignedProjects($id){
      $this->db->query('SELECT * FROM scheduleitem_assignedemp INNER JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID INNER JOIN project ON Project_projectID = projectID WHERE scheduleitem_assignedemp.UserID = :engID AND scheduleitem_assignedemp.status = 0');
      $rows = $this->db->resultSet(['engID' => $id]);
      return $rows;
    }

    public function getAssignedProjectDetails($eng_Id, $prj_ID){
      $this->db->query('SELECT * FROM projectengineer INNER JOIN project ON projectengineer.Project_projectID = project.projectID INNER JOIN customer ON project.customerID = customer.customerID  WHERE  Engineer_empID = :engID AND Project_projectID = :prjID');
      $row = $this->db->single(['engID' => $eng_Id,'prjID' => $prj_ID]);
      return $row;
    }
    

    public function projectAssignPack($prj_ID,$pck_ID){
      $this->db->query('UPDATE project SET Package_packageID = :packID WHERE projectID = :projID');
      $this->db->execute(['packID'=> $pck_ID, 'projID'=> $prj_ID]);
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

    public function getScheduleitem($prjID,$date){
      $this->db->query('SELECT * from `scheduleitem` WHERE Project_projectID  = :prjID AND `date` LIKE :datestr;');
      $row = $this->db->single(['prjID' => $prjID,'datestr'=>$date.'%']);
      return $row;
    }

    public function confirmSchedule($schdID){
      $this->db->query('UPDATE `scheduleitem_assignedemp` SET `status` = 1 WHERE scheduleID  = :scheduleID;');
      $this->db->execute(['scheduleID' => $schdID]);
    }

    public function completeSchedule($schdID){
      $this->db->query('UPDATE `scheduleitem` SET `isCompleted` = 1 WHERE scheduleID  = :scheduleID;');
      $this->db->execute(['scheduleID' => $schdID]);
    }

    public function declineSchedule($schdID){
      $this->db->query('UPDATE `scheduleitem_assignedemp` SET `status` = 2 WHERE scheduleID  = :scheduleID;');
      $this->db->execute(['scheduleID' => $schdID]);
    }

    public function advanceProject($prjID,$status){
      $this->db->query('UPDATE `project` SET `status` = :status WHERE projectID  = :projectID;');
      $this->db->execute(['projectID'=>$prjID,'status'=> $status]);
    }

    //PackMod Main
    public function checkModifiedPackage($prjID){
      $this->db->query('SELECT count(projectID) as Count from `modifiedpackage` WHERE projectID = :prjID;');
      $count = $this->db->single(['prjID' => $prjID])->Count;
      return (int)$count;
    }

    public function getModifiedPackageInfo($prjID){
      $this->db->query('SELECT * FROM modifiedpackage INNER JOIN package ON modifiedpackage.basePackageID = package.packageID WHERE projectID = :prjID;');
      $row = $this->db->single(['prjID' => $prjID]);
      return $row;
    }

    public function createModifiedPackage($data){
      $this->db->query('INSERT INTO modifiedpackage VALUES (:projectID,:packID);');
      $this->db->execute(['projectID' => $data[0],'packID'=>$data[1]]);
    }

    public function updateModifiedPackage($data){
      $this->db->query('UPDATE modifiedpackage SET basePackageID = :packID  WHERE projectID = :projectID;');
      $this->db->execute(['projectID' => $data[0],'packID'=>$data[1]]);
    }

    public function removeModifiedPackage($prjID){
      $this->db->query('DELETE FROM modifiedpackage WHERE projectID = :projectID;');
      $this->db->execute(['projectID' => $prjID]);
    }


    //PackMod Content
    public function getModifiedPackageContent($prjID){
      $this->db->query('SELECT * FROM modifiedpackage_product INNER JOIN product ON modifiedpackage_product.productID = product.productiD WHERE projectID = :prjID;');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function PackModCheckContent($prjID,$prdID){
      $this->db->query('SELECT count(projectID) as Count FROM modifiedpackage_product WHERE projectID = :prjID AND productID = :prdID;');
      $count = $this->db->single(['prjID'=>$prjID, 'prdID'=>$prdID])->Count;
      return (int)$count;
    }

    public function PackModAddContent($data){
      $this->db->query('INSERT INTO modifiedpackage_product VALUES (:projectID,:productID,:productQuantity);');
      $this->db->execute(['projectID' => $data[0],'productID'=>$data[1],'productQuantity'=>$data[2]]);
    }

    public function PackModUpdateContent($data){
      $this->db->query('UPDATE modifiedpackage_product SET productQuantity = :productQuantity WHERE projectID = :projectID AND productID = :productID;');
      $this->db->execute(['projectID' => $data[0],'productID'=>$data[1],'productQuantity'=>$data[2]]);
    }

    public function PackModRemoveContent($data){
      $this->db->query('DELETE FROM modifiedpackage_product WHERE projectID = :projectID AND productID = :productID;');
      $this->db->execute(['projectID' => $data[0],'productID'=>$data[1]]);
    }


    //PackMod Extras
    public function getModifiedPackageExtras($prjID){
      $this->db->query('SELECT * FROM modifiedpackage_extra WHERE projectID = :prjID;');
      $rows = $this->db->resultSet(['prjID' => $prjID]);
      return $rows;
    }

    public function PackModCheckExtra($prjID,$descr){
      $this->db->query('SELECT count(projectID) as Count FROM modifiedpackage_extra WHERE projectID = :prjID AND `description` = :descr;');
      $count = $this->db->single(['prjID'=>$prjID, 'descr'=>$descr])->Count;
      return (int)$count;
    }
    

    public function PackModAddExtra($data){
      $this->db->query('INSERT INTO modifiedpackage_extra VALUES (:projectID,:descr,:price);');
      $this->db->execute(['projectID' => $data[0],'descr'=>$data[1],'price'=>$data[2]]);
    }

    public function PackModUpdateExtra($data){
      $this->db->query('UPDATE modifiedpackage_extra SET price = :price WHERE projectID = :projectID AND `description` = :descr;');
      $this->db->execute(['projectID' => $data[0],'descr'=>$data[1],'price'=>$data[2]]);
    }

    public function PackModRemoveExtra($data){
      $this->db->query('DELETE FROM modifiedpackage_extra WHERE projectID = :projectID AND `description` = :descr;');
      $this->db->execute(['projectID' => $data[0],'descr'=>$data[1]]);
    }

    public function getSPname($SPID){
      $this->db->query('SELECT `name` FROM `employee`  WHERE empID = :SPID;');
      $row = $this->db->single(['SPID'=>$SPID]);
      return $row->name;
    }


  }
?>