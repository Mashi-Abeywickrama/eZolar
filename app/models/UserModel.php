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
        return ($row -> UserID);
      // print_r($row);die();
      }

      public function getUserID2($email){
        $this->db->query('SELECT UserID FROM user where email = :email');
        // $this->db->bind(':email', $email[0]);
        $row = $this->db->single(['email' => $email[0]]);
        // print_r($row);die();
        return ($row -> UserID);
      }
      
      public function getUserRole($email){
        $this->db->query('SELECT type FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        return ($row->type);
      }

      public function getProfile($id,$role){
        if ($role == "Customer") {
          $this->db->query('SELECT * FROM customer where customerID = :customerID');
          //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
          // $row = $this->db->resultSet(['ED' => $id]);
          $row = $this->db->resultSet(['customerID' => $id]);
          // print_r($row);die;
          return $row;
        }
        elseif ($role == "Contractor") {
          
          $this->db->query('SELECT * FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.empID= :ED');
         //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
         // $row = $this->db->resultSet(['ED' => $id]);
          $row = $this->db->resultSet(['ED' => $id]);
          
         // print_r($row);die;
          return $row;
         }elseif ($role == "Salesperson"){
            $this->db->query('SELECT * FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.empID= :ED');
            $row = $this->db->resultSet(['ED' => $id]);
            return $row;
        } else {
            $this->db->query('SELECT user.email,employee.name,employee.type,employee_telno.telno,employee.nic FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID INNER JOIN user ON employee.empID = user.userID WHERE employee.empID= :ED');
            //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
            $row = $this->db->resultSet(['ED' => $id]);
            //$row = $this->db->resultSet();
            return $row;
        }
      }

      // public function getProfileImg($id,$role){
        
      //   if ($role == "Customer") {
      //     $this->db->query('SELECT * FROM customer where customerID = :customerID');
      //     //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
      //     // $row = $this->db->resultSet(['ED' => $id]);
      //     $row = $this->db->resultSet(['customerID' => $id]);
      //     // print_r($row);die;
      //     return $row;
      //   }
      //   elseif ($role == "Contractor") {
          
      //     $this->db->query('SELECT employee.name,employee.type,employee_telno.telno,employee.nic,employee.gender,employee.bio FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.empID= :ED');
      //    //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
      //    // $row = $this->db->resultSet(['ED' => $id]);
      //     $row = $this->db->resultSet(['ED' => $id]);
          
      //    // print_r($row);die;
      //     return $row;
      //    } else {
      //       $this->db->query('SELECT user.email,employee.name,employee.type,employee_telno.telno,employee.nic FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID INNER JOIN user ON employee.empID = user.userID WHERE employee.empID= :ED');
      //       //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
      //       $row = $this->db->resultSet(['ED' => $id]);
      //       //$row = $this->db->resultSet();
      //       return $row;
      //   }
      // }

      public function editProfile($data,$role,$id,$img){
        // print_r($data);die;
        if ($role == "Customer") {
          $this->db->query('UPDATE customer SET name = :name, mobile = :mobile , address = :home, profilePhoto = :fileToUpload WHERE customerID = :userid');
          $this->db->execute(['userid' => $id,'name' => $data['name'],'mobile' => $data['mobile'], ':home' => $data['address'], ':fileToUpload'=>$img]);
          $this->db->query('UPDATE user SET email = :email WHERE userID = :userid');
          $this->db->execute(['userid' => $id,'email' => $data['email']]);
          return true;
        }
        elseif ($role == "Contractor") {
          $this->db->query('UPDATE employee SET name = :name, bio = :bio, profilePhoto = :fileToUpload WHERE empID = :userid');
          $this->db->execute(['userid' => $id,'name' => $data['name'], 'bio' =>$data['bio'],':fileToUpload'=>$img]);
          $this->db->query('UPDATE user SET email = :email WHERE userID = :userid');
          $this->db->execute(['userid' => $id,'email' => $data['email']]);
          $this->db->query('UPDATE employee_telno SET telno = :mobile WHERE Employee_empID = :userid');
          $this->db->execute(['userid' => $id,'mobile' => $data['mobile']]);
          $this->db->query('UPDATE contractor SET name = :name, bio = :bio, profilePhoto = :fileToUpload WHERE contractorID= :userid');
          $this->db->execute(['userid' => $id,'name' => $data['name'], 'bio' =>$data['bio'],':fileToUpload'=>$img]);
          return true;  
        }
      }


      public function updatePassword($data,$id){
        $this->db->query('UPDATE user SET password = :name userID = :userid');
      }
  }