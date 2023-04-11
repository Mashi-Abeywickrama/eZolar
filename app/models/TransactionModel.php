<?php
    class TransactionModel {
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
        
        //to get all transactions done by the user
        public function getAllPayments($id){
          // print_r($id);die;
          $this->db->query('SELECT * FROM paymentreceipt INNER JOIN  project ON paymentreceipt.Project_projectID = project.projectID WHERE project.customerID = :customerID');
        
          // print_r($this->db->resultSet(['customerID' => $id]));die;
          $row = $this->db->resultSet(['customerID' => $id]);
          return $row;
        }
    }
?>