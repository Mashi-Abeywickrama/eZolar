<?php
class AdminEditProfileModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUserID($email){
        $this->db->query('SELECT UserID FROM user where email = :email');
        $row = $this->db->single(['email' => $email[0]]);
        return ($row -> UserID);

    }

    public function getProfile($id){
        $this->db->query('SELECT employee.bio,employee_telno.telno,employee.name FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.empID= :userID');
        //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
        $row = $this->db->resultSet(['userID' => $id]);
        //$row = $this->db->resultSet();
        return $row;
    }

    public function editProfile($data){



//        $this->db->query('SELECT `userID` FROM user WHERE email = :email');
//        $userid  =($this->db->single(['email'=> $data[1]]));
//        print_r($userid);


        $this->db->query('UPDATE employee SET name = :name,bio = :bio WHERE empID = :userid');
        $this->db->execute(['userid' => $data[3],'name' => $data[0],'bio' => $data[1]]);
        $this->db->query('UPDATE employee_telno SET telno = :telno WHERE Employee_empID = :userid');
        $this->db->execute(['userid' => $data[3],'telno' => $data[2]]);
    }





}
