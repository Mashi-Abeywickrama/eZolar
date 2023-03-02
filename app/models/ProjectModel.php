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
      
      $this->db->query('SELECT * FROM project WHERE  customerID = :customerID');
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
     public function getContractorProjects(){
      $this->db->query('SELECT * FROM project');
      $row = $this->db->resultSet([]);
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

  }
?>