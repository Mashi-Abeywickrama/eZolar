<?php
  class InquiryModel {
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

    public function addInquiry($data){
      // $userid  =($this->db->single());
      
      $this->db->query('INSERT INTO inquiry(`customerID`,`topic`, `type`,`message`) VALUES (:customerID,:topic,:type,:message)');
      $this->db->bind(':customerID', $data[0]);
      $this->db->bind(':topic', $data[1]);
      $this->db->bind(':type', $data[2]);
      $this->db->bind(':message', $data[3]);
        
      $this->db->execute();
    }

    public function getAllInquiries(){
      
      $this->db->query('SELECT * FROM inquiry');
      $row = $this->db->resultSet();
      return $row;


    }

  }