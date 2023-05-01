<?php


class StatisticsModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function salesPerMonth(){
        $year = date('Y');
        $this->db->query("SELECT COUNT(*) AS count, DATE_FORMAT(date, '%M') AS month
                            FROM scheduleitem WHERE YEAR(date) = $year
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


}
