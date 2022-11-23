<?php

class RegisterModel{

    public function __construct(){
        $this->db = new Database;
    }

    public function getuser($id){
        $this->db->query('SELECT * FROM user WHERE userID = :id AND type = "customer"');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    public function registerCustomer($data){
    
        $this->db->query('INSERT INTO user(`email`, `password`,`type`) VALUES (:email,:password,:type)');
        $this->db->bind(':email', $data[3]);
        $this->db->bind(':password', $data[9]);
        $this->db->bind(':type', $data[8]);
        
        $this->db->execute();
        
        $this->db->query('SELECT `userID` FROM user WHERE email = :email');
        $this->db->bind(':email', $data[3]);
        $userid  =($this->db->single());
        $this->db->execute();
    

    
        $this->db->query('INSERT INTO customer(`customerID`,`name`,`nic`, `mobile`,`address`) VALUES (:userid,:name,:nic,:mobile, :home)');
        
        $this->db->bind(':userid', $userid->userID);
        $this->db->bind(':name', $data[2]);
        $this->db->bind(':nic', $data[5]);
        $this->db->bind(':mobile', $data[4]);
        $this->db->bind(':home', $data[6]);

        if($this->db->execute()){
            print_r("Working");die();
            return true;
        } else {
            return false;
        }
    }

}
