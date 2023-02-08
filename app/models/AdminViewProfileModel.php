<?php
class AdminViewProfileModel{
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
        $this->db->query('SELECT user.email,employee.name,employee.type,employee_telno.telno,employee.nic FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID INNER JOIN user ON employee.empID = user.userID WHERE employee.empID= :ED');
        //$this->db->query('SELECT nic FROM employee WHERE empID=:empID');
        $row = $this->db->resultSet(['ED' => $id]);
        //$row = $this->db->resultSet();
        return $row;
    }







}