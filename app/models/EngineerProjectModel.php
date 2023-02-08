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

  }
?>