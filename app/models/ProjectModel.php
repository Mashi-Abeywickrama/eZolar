<?php
  class ProjectModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUserID($email){
      $this->db->query('SELECT UserID FROM user where email = :email');
      $this->db->bind(':email', $email[0]);
      $row = $this->db->single();
      return ($row -> UserID);
    }

    public function getAllProjects($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID');
      $this->db->bind(':customerID', $id);

      // print_r($this->db->resultSet());die;
      $row = $this->db->resultSet();
      return $row;
    }

    public function newProject($data){
      // $userid  =($this->db->single());
      
      $this->db->query('INSERT INTO project(`customerID`,`siteAddress`) VALUES (:customerID,:site)');
      $this->db->bind(':customerID', $data[0]);
      $this->db->bind(':topic', $data[1]);
        
      // $this->db->execute();
      if($this->db->execute()){
        header('Location:/ezolar/project');
        // print_r("working");
        // die();
        return true;
      } else {
          return false;
      }
    }

  }
?>