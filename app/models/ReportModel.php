<?php


class ReportModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserRole($email){
        $this->db->query('SELECT `type` FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        return ($row->type);
    }

    public function getUserID($email){
        $this->db->query('SELECT UserID FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        return ($row -> UserID);
      }

    public function getweeksInspections($weekdata){   
        $this->db->query('SELECT COUNT(scheduleID) as Count FROM scheduleitem_assignedemp INNER JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID WHERE `date` BETWEEN :sdate AND :edate;');
        $results = $this->db->single(['sdate'=>$weekdata[0],'edate'=>$weekdata[1]]);
        return $results->Count;
    }

    public function getweeksInspectionsofUser($weekdata,$engID){   
        $this->db->query('SELECT COUNT(scheduleID) as Count FROM scheduleitem_assignedemp INNER JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID WHERE UserID = :engID AND `date` BETWEEN :sdate AND :edate;');
        $results = $this->db->single(['sdate'=>$weekdata[0],'edate'=>$weekdata[1],'engID'=>$engID]);
        return $results->Count;
    }

    public function countEngineers(){   
        $this->db->query('SELECT COUNT(EngineerID) as Count FROM engineer;');
        $results = $this->db->single([]);
        return $results->Count;
    }

    public function getWeeksProjects($weekdata,$engID){
        $this->db->query('SELECT projectID FROM scheduleitem_assignedemp 
                        INNER JOIN scheduleitem ON ScheduleItem_scheduleID = scheduleID 
                        INNER JOIN modifiedpackage ON Project_projectID = projectID
                        WHERE UserID = :engID AND `date` BETWEEN :sdate AND :edate;');
        $results = $this->db->resultSet(['sdate'=>$weekdata[0],'edate'=>$weekdata[1],'engID'=>$engID]);
        return $results;
    }

    public function getModPack($prjID){
        $this->db->query('SELECT * FROM modifiedpackage_product
                        INNER JOIN product ON modifiedpackage_product.productID = product.productID
                        WHERE projectID = :projectID;');
        $products = $this->db->resultSet(['projectID'=>$prjID]);

        $this->db->query('SELECT * FROM modifiedpackage_extra WHERE projectID = :projectID;');
        $extras = $this->db->resultSet(['projectID'=>$prjID]);

        return array('products'=>$products,'extras'=>$extras);
    }


}
