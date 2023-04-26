  <?php
  class InquiryModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addInquiry($data){
      // $userid  =($this->db->single());
      
      $this->db->query('INSERT INTO inquiry(`customerID`,`topic`, `type`) VALUES (:customerID,:topic,:type) ');

      // $this->db->execute();
      if($this->db->execute(['customerID' => $data[0], 'topic' => $data[1],'type' => $data[2]])){
        $this->db->query('SELECT last_insert_id() AS inqid');
        // print_r($inq_id);die();
        $res = $this->db->single([]);
        $inq_id = $res -> inqid;
       
        $this->db->query('INSERT INTO inquiry_message(`Inquiry_inquiryID`,`messageID`, `sender`,`message`) VALUES (:Inquiry_inquiryID,:messageID,:sender,:message) ');
        if($this->db->execute(['Inquiry_inquiryID' => $inq_id, 'messageID' => 1,'sender' => 1,'message' => $data[3]])){
            return true;
        }
        // print_r("working");
        // die();
       
    } else {
        return false;
    }
    }

    public function getAllInquiries($id){
      // print_r($id);die;
      
      $this->db->query('SELECT * FROM inquiry WHERE  customerID = :customerID ORDER BY `inquiryID` DESC');

      // print_r($this->db->resultSet());die;
      $row = $this->db->resultSet(['customerID' => $id]);
      // print_r($row);die;
      return $row;


    }

    public function viewMore($id){
      $this->db->query('SELECT * FROM inquiry INNER JOIN employee ON employee.empID = inquiry.Salesperson_Employee_empID WHERE inquiryID = :inquiryID');

      // print_r($this->db->resultSet());die;
      $row = $this->db->resultSet(['inquiryID' => $id]);
      // print_r($row);die;
      return $row;
    }

        // * * * * salesperson functions * * * *

      public function getUserID($email){
          $this->db->query('SELECT UserID FROM user where email = :email');
          $row = $this->db->single(['email' => $email[0]]);
          return ($row -> UserID);
      }
     // INQUIRIES SHOWS TO ASSIGNED SALESPERSON

    public function getSalespersonInquiries($userID){
    $this->db->query('SELECT * FROM inquiry INNER JOIN customer ON customer.customerID = inquiry.customerID WHERE Salesperson_Employee_empID=:userID  ORDER BY inquiryID');
    $row = $this->db->resultSet(['userID' => $userID]);
    return $row;
  }

  public function viewInquiries($inquiryID){
      $this->db->query('SELECT * FROM inquiry INNER JOIN customer ON customer.customerID = inquiry.customerID WHERE inquiryID = :inquiryID');
      $row = $this->db->resultSet(['inquiryID'=>$inquiryID]);
      return $row;
  }
  public function respondInquiries($inquiryID,$data){
       $this->db->query('UPDATE inquiry SET response = :response WHERE inquiryID = :inquiryID;');
       $row = $this->db->resultSet(['response' => $data[0],'inquiryID'=>$inquiryID]);
       return $row;
      }


  }