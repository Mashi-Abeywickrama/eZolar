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


}
