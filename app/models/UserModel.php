<?php
  class UserModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Login User
    public function login($email, $password){
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $row = $this->db->single(['email' => $email]);

        $hashed_password = $row->password; 

        if(password_verify($password, $hashed_password)){
          return true;
        } else {
          return false;
        }

      }
      public function getUserID($email){
        $this->db->query('SELECT UserID FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        print_r($row);die();
      }
      
      public function getUserRole($email){
        $this->db->query('SELECT type FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        return ($row->type);
      }
  }