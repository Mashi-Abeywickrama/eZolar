<?php
  class ReviewsModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    // Login User
   public function addReview($customer_Id,$stars,$comment)
   {
        $this->db->query('INSERT INTO review(`CustomerID`,`stars`,`comment`) VALUES (:customer_Id,:stars,:comment)');
        $res = $this->db->execute(['customer_Id' => $customer_Id,'stars' => $stars,'comment' => $comment]);
        if ($res) {
            return true;
        } else {
            return false;
        }
        
   }
   public function selectReview($stars)
   {
        $this->db->query('SELECT * FROM review  
        WHERE stars = :stars
        ');
        $row = $this->db->resultSet(['stars' => $stars]);
        return $row;
   }

   public function selectAllReview()
   {
        $this->db->query('SELECT * FROM review  
        INNER JOIN customer ON customer.customerID = review.CustomerID
        ORDER BY review.stars DESC
        ');
        $row = $this->db->resultSet([]);
        return $row;
   }
   
  }