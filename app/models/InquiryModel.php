<?php
  class InquiryModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addInquiry($data){
      // $userid  =($this->db->single());
      
      $this->db->query('INSERT INTO inquiry(`customerID`,`topic`, `type`,`message`) VALUES (:customerID,:topic,:type,:message) ');

      // $this->db->execute();
      if($this->db->execute(['customerID' => $data[0], 'topic' => $data[1],'type' => $data[2],'message' => $data[3]])){
        header('Location:/ezolar/inquiry');
        // print_r("working");
        // die();
        return true;
    } else {
        return false;
    }
    }

    public function getAllInquiries($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM inquiry WHERE  customerID = :customerID ORDER BY `inquiryID` DESC');

      // print_r($this->db->resultSet());die;
      $row = $this->db->resultSet(['customerID' => $id]);
      // print_r($row);die;
      return $row;


    }

    public function viewMore($id){
      $this->db->query('SELECT * FROM inquiry WHERE  inquiryID = :inquiryID');

      // print_r($this->db->resultSet());die;
      $row = $this->db->resultSet(['inquiryID' => $id]);
      // print_r($row);die;
      return $row;
    }

        // * * * * salesperson functions * * * *
     // TODO -> CHECK IS ALL INQUIRIES SHOWS TO ALL THE SALESPERSONS
     public function getSalespersonInquiries(){

      $this->db->query('SELECT customer.name,inquiry.topic FROM inquiry INNER JOIN customer ON customer.customerID = inquiry.customerID ORDER BY inquiryID');
      $row = $this->db->resultSet([]);
      return $row;
  }

  }