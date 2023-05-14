<?php


class StatisticsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserID($email){
        $this->db->query('SELECT UserID FROM user where email = :email');
        $row = $this->db->single(['email' => $email[0]]);
        return ($row -> UserID);
      }

    public function salesPerMonth(){
        $year = date('Y');
        $this->db->query("SELECT COUNT(*) AS count, DATE_FORMAT(date, '%M') AS month
                            FROM scheduleitem WHERE YEAR(date) = $year AND type='Delivery'
                            GROUP BY MONTH(date)");
        $row = $this->db->resultSet([]);
        return $row;
    }

    public function salesPerMonthPreviousYear(){
        $year = date('Y');
        $previous_year = $year -1;
        $this->db->query("SELECT COUNT(*) AS count, DATE_FORMAT(date, '%M') AS month
                            FROM scheduleitem WHERE YEAR(date) = $previous_year AND type='Delivery'
                            GROUP BY MONTH(date)");
        $row = $this->db->resultSet([]);
        return $row;
    }

    public function packageSales(){
        $this->db->query("SELECT COUNT(*) AS packageCount,package.name FROM project 
                            INNER JOIN package ON package.packageID = project.Package_packageID 
                            GROUP BY project.Package_packageID");
        $row = $this->db->resultSet([]);
        return $row;
    }

    public function inspectionPerMonth(){
        $year = date('Y');
        $this->db->query('SELECT COUNT(*) AS count, DATE_FORMAT(date, "%M") AS month
                            FROM scheduleitem WHERE YEAR(date) = :year AND type="Inspection"
                            GROUP BY MONTH(date)');
        $row = $this->db->resultSet(['year'=>$year]);
        return $row;
    }

    public function deliveriesPerMonth(){
        $year = date('Y');
        $this->db->query('SELECT COUNT(*) AS count, DATE_FORMAT(date, "%M") AS month
                            FROM scheduleitem WHERE YEAR(date) = :year AND type="Delivery"
                            GROUP BY MONTH(date)');
        $row = $this->db->resultSet(['year'=>$year]);
        return $row;
    }

    public function getUserRole($email){
        $this->db->query('SELECT type FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        return ($row->type);
      }

      public function salespersonInteraction($userId,$weekdata){
        $this->db->query('SELECT COUNT(*) AS message_count FROM inquiry_message INNER JOIN 
        inquiry ON inquiry_message.Inquiry_inquiryID = inquiry.inquiryID WHERE Salesperson_Employee_empID= :userId AND 
        time BETWEEN :startDate AND :endDate AND sender=0');
        $row = $this->db->single(['userId' => $userId, 'startDate' => $weekdata[0], 'endDate' => $weekdata[1]]);
        return ($row->message_count);
      }
}
