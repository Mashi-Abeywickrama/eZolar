<?php
class SalespersonScheduleModel {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUserID($email){
        $this->db->query('SELECT UserID FROM user where email = :email');
        $row = $this->db->single(['email' => $email[0]]);
        return ($row -> UserID);
    }

    public function getInspectionScheduleItems($userID,$month,$year){
        $this->db->query('SELECT * FROM scheduleitem 
inner join scheduleitem_assignedemp ON scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID 
                inner join project on project.projectID = scheduleitem.Project_projectID  
                inner join employee ON scheduleitem_assignedemp.userID = employee.empID
                where project.Salesperson_Employee_empID = :userID AND scheduleitem.type = "Inspection" 
                AND scheduleitem.date >= :startDate AND scheduleitem.date <= :endDate');
        $start = $year.'-'.str_pad(strval($month),2,'0',STR_PAD_LEFT).'-01';
        $end = $year.'-'.str_pad(strval($month+1),2,'0',STR_PAD_LEFT).'-01';
        $rows = $this->db->resultSet(['userID' => $userID, 'startDate' => $start, 'endDate' => $end]);
        return ($rows);
    }

    public function getDeliveryScheduleItems($userID,$month,$year){
        $this->db->query('SELECT * FROM scheduleitem 
inner join scheduleitem_assignedcontr ON scheduleitem.scheduleID = scheduleitem_assignedcontr.ScheduleItem_scheduleID 
                inner join project on project.projectID = scheduleitem.Project_projectID  
                inner join contractor ON scheduleitem_assignedcontr.contractorID = contractor.contractorID
                where project.Salesperson_Employee_empID = :userID AND scheduleitem.type = "Delivery" 
                AND scheduleitem.date >= :startDate AND scheduleitem.date <= :endDate;');
        $start = $year.'-'.str_pad(strval($month),2,'0',STR_PAD_LEFT).'-01';
        $end = $year.'-'.str_pad(strval($month+1),2,'0',STR_PAD_LEFT).'-01';
        $rows = $this->db->resultSet(['userID' => $userID, 'startDate' => $start, 'endDate' => $end]);
        return ($rows);
    }
}
