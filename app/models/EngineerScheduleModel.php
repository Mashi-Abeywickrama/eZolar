<?php
  class EngineerScheduleModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUserID($email){
      $this->db->query('SELECT UserID FROM user where email = :email');
      $row = $this->db->single(['email' => $email[0]]);
      return ($row -> UserID);
    }

    public function getScheduleItems($userID,$month,$year){
      $this->db->query('SELECT * FROM scheduleitem inner join scheduleitem_assignedemp on scheduleitem.scheduleID = scheduleitem_assignedemp.ScheduleItem_scheduleID inner join project on project.projectID = scheduleitem.Project_projectID  where scheduleitem_assignedemp.UserID	 = :userID AND scheduleitem.date >= :startDate AND scheduleitem.date <= :endDate');
      $start = $year.'-'.str_pad(strval($month),2,'0',STR_PAD_LEFT).'-01';
      $end = $year.'-'.str_pad(strval($month+1),2,'0',STR_PAD_LEFT).'-01';
      $rows = $this->db->resultSet(['userID' => $userID, 'startDate' => $start, 'endDate' => $end]);
      return ($rows);
    }

  }
?>