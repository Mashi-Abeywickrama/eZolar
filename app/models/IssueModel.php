<?php
  class IssueModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUser($email){
      $this->db->query('SELECT * FROM user INNER JOIN employee ON user.UserID = employee.empID where email = :email');
      $row = $this->db->single(['email' => $email[0]]);
      return $row;
    }

    public function getAssignedProjects($id){
     
      $this->db->query('SELECT * FROM projectengineer INNER JOIN project ON projectengineer.Project_projectID = project.projectID WHERE  Engineer_empID = :engID');
      $rows = $this->db->resultSet(['engID' => $id]);
      return $rows;
    }

    public function addIssue($data){
      if ($data[1]=="NULL"){
        $this->db->query('INSERT INTO issue(`topic`,`message`,`userId`) VALUES (:topic,:message_,:userId)');
      $this->db->execute(['userId' => $data[0], 'topic' => $data[2], 'message_' => $data[3]]);
      }
      else{
      $this->db->query('INSERT INTO issue(`Project_projectID`, `topic`,`message`,`userId`) VALUES (:projectID,:topic,:message_,:userId)');
      $this->db->execute(['userId' => $data[0], 'projectID' => $data[1], 'topic' => $data[2], 'message_' => $data[3]]);
      }
    }

  }
?>