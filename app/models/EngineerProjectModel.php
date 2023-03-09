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

    public function getAssignedProjectDetails($eng_Id, $prj_ID){
      $this->db->query('SELECT * FROM projectengineer INNER JOIN project ON projectengineer.Project_projectID = project.projectID WHERE  Engineer_empID = :engID AND Project_projectID = :prjID');
      $row = $this->db->single(['engID' => $eng_Id,'prjID' => $prj_ID]);
      return $row;
    }

    public function projectAssignPack($prj_ID,$pck_ID){
      $this->db->query('UPDATE project SET Package_packageID = :packID WHERE projectID = :projID');
      $this->db->execute(['packID'=> $pck_ID, 'projID'=> $prj_ID]);
    }

  }
?>