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
          
          $this->db->query('SELECT employee.name,employee.type,employee_telno.telno,employee.nic,employee.gender,employee.bio FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.empID= :ED');
         //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
         // $row = $this->db->resultSet(['ED' => $id]);
          $row = $this->db->resultSet(['ED' => $id]);
          
         // print_r($row);die;
          return $row;
         }elseif ($role == "Salesperson"){
            $this->db->query('SELECT employee.name,employee.type,employee_telno.telno,employee.bio,employee.nic FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.empID= :ED');
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

      public function getProfileImg($id,$role){
        
        if ($role == "Customer") {
          $this->db->query('SELECT * FROM customer where customerID = :customerID');
          //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
          // $row = $this->db->resultSet(['ED' => $id]);
          $row = $this->db->resultSet(['customerID' => $id]);
          // print_r($row);die;
          return $row;
        }
        elseif ($role == "Contractor") {
          
          $this->db->query('SELECT employee.name,employee.type,employee_telno.telno,employee.nic,employee.gender,employee.bio FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.empID= :ED');
         //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
         // $row = $this->db->resultSet(['ED' => $id]);
          $row = $this->db->resultSet(['ED' => $id]);
          
         // print_r($row);die;
          return $row;
         } else {
            $this->db->query('SELECT user.email,employee.name,employee.type,employee_telno.telno,employee.nic FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID INNER JOIN user ON employee.empID = user.userID WHERE employee.empID= :ED');
            //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
            $row = $this->db->resultSet(['ED' => $id]);
            //$row = $this->db->resultSet();
            return $row;
        }
      }

      public function editProfile($data,$role,$id,$img){
        // print_r($data);die;
        
          $this->db->query('UPDATE customer SET name = :name, mobile = :mobile , address = :home, profile = :fileToUpload WHERE customerID = :userid');
          $this->db->execute(['userid' => $id,'name' => $data['name'],'mobile' => $data['mobile'], ':home' => $data['address'], ':fileToUpload'=>$img]);
          $this->db->query('UPDATE user SET email = :email WHERE userID = :userid');
          $this->db->execute(['userid' => $id,'email' => $data['email']]);
          return true;



      }
  }