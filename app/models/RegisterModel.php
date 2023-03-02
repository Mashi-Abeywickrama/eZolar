<?php

class RegisterModel{

    public function __construct(){
        $this->db = new Database;
    }

    public function getuser($id){
        $this->db->query('SELECT * FROM user WHERE userID = :id AND type = "customer"');
        //$this->db->bind();
        $row = $this->db->single(['id'=> $id]);
        return $row;
    }

    public function registerCustomer($data){
    
        $this->db->query("SELECT email FROM user WHERE email = :mail");
        // $this->db->bind(':mail',$data[3]);
        // $this->db->execute();
        $row = $this->db->resultSet(['mail'=>$data[3]]);
        // print_r($row);die;
        if(empty($row)){

            $this->db->query('INSERT INTO user(`email`, `password`,`type`) VALUES (:email,:password,:type)');
            // $this->db->bind('email', $data[3]);
            // $this->db->bind('password', $data[9]);
            // $this->db->bind('type', $data[8]);
            
            $this->db->execute(['email'=> $data[3],'password'=> $data[9],'type'=> $data[8]]);
            
            $this->db->query('SELECT `userID` FROM user WHERE email = :email');
            //$this->db->bind('email', $data[3]);
            $userid  =($this->db->single(['email'=> $data[3]]));
            $this->db->execute(['email'=> $data[3]]);
            

            
            $this->db->query('INSERT INTO customer(`customerID`,`name`,`nic`, `mobile`,`address`) VALUES (:userid,:name,:nic,:mobile, :home)');
            
            // $this->db->bind('userid', $userid->userID);
            // $this->db->bind('name', $data[2]);
            // $this->db->bind('nic', $data[5]);
            // $this->db->bind('mobile', $data[4]);
            // $this->db->bind('home', $data[6]);

            if($this->db->execute(['userid'=> $userid->userID,'name'=> $data[2],'nic'=> $data[5],'mobile'=> $data[4],'home'=> $data[6]])){
                header('Location:/ezolar/login');
                // print_r("working");
                // die();
                return true;
            } else {
                return false;
            }
        }
        else{

            $_SESSION['err'] = 'Email already exist';
            header('Location:/ezolar/register');
            // print_r('Already Exist');die;
        }
    }
    // public function ifEmailExist($data){
    //     $value = $this->db->query("SELECT email FROM user WHERE email = :mail");
    //     //$this->db->bind(':mail',$data);
    //     $this->db->execute(['mail'=>$data]);
    //     // print_r($value);
    //     return $value;

    // }
}
