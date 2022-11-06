<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    // Login User
    public function login($email, $password){
        $this->db->query('SELECT * FROM user WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        $hashed_password = $row->password;

        if(password_verify($password, $hashed_password)){
          return true;
        } else {
          return false;
        }

      }


  }