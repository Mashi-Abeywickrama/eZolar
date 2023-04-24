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
          $this->db->query('SELECT * FROM paymentreceipt INNER JOIN  project ON paymentreceipt.Project_projectID = project.projectID WHERE project.customerID = :customerID ORDER BY `uploadedTime` DESC');
        
          // print_r($this->db->resultSet(['customerID' => $id]));die;
          $row = $this->db->resultSet(['customerID' => $id]);

          foreach($row as $x){
            //lets generate an id with 6 digits as transaction ID
            $x->receiptID = str_pad($x->receiptID, 6, '0', STR_PAD_LEFT);
            //Checking if the transaction is verified or not
            if(($x->isVerified) == 0) {
              $x->isVerified = "Not verified yet";
              // print_r($x->isVerified);
            }
            else if(($x->isVerified) == 1) {
              $x->isVerified = "Accepted";
              // print_r($x->isVerified);
            }
            else if(($x->isVerified) == 2) {
              $x->isVerified = "Rejected";
              // print_r($x->isVerified);
            }
          }
          return $row;
        }
        public function viewMore($id){
          // print_r($id);die;
          $this->db->query('SELECT * FROM paymentreceipt INNER JOIN  project ON paymentreceipt.Project_projectID = project.projectID WHERE paymentreceipt.receiptID = :receiptID');
        
          // print_r($this->db->resultSet(['customerID' => $id]));die;
          $row = $this->db->resultSet(['receiptID' => $id]);

          if(($row[0]->isVerified) == 0) {
            $row[0]->isVerified = "Pending";
            $row[0] ->Salesperson_Employee_empID = "Not yet verified";
            // print_r($x->isVerified);
          }
          else if(($row[0]->isVerified) == 1) {
            $row[0]->isVerified = "Accepted";
            $row[0] ->Salesperson_Employee_empID = str_pad($row[0]->Salesperson_Employee_empID, 6, '0', STR_PAD_LEFT);
            // print_r($x->isVerified);
          }
          else if(($row[0]->isVerified) == 2) {
            $row[0]->isVerified = "Rejected";
            //lets add zeros to make id as a 6 digit integer
            $row[0] ->Salesperson_Employee_empID = str_pad($row[0]->Salesperson_Employee_empID, 6, '0', STR_PAD_LEFT);
            // print_r($x->isVerified);
          }
          $row[0]->receiptID = str_pad($row[0]->receiptID, 6, '0', STR_PAD_LEFT);
          return $row;
        }
    }
?>