<?php

class ChatSystemModel
{

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserID($email){
        $this->db->query('SELECT UserID FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        return ($row -> UserID);
        // print_r($row);die();
    }

    public function getUserRole($email){
        $this->db->query('SELECT type FROM user where email = :email');
        $row = $this->db->single(['email' => $email]);
        return ($row->type);
    }

    // view messages chat function for salesperson
    //TODO -> check on how salesperson interact with inquiry and change salesperson ID to check other inquiry messages
    public function viewMessages($inquiryID,$userID,$role){
        if ($role == "Salesperson"){
            $this->db->query('SELECT * FROM inquiry INNER JOIN inquiry_message ON inquiryID = inquiry_inquiryID WHERE Salesperson_Employee_empID = :userID AND inquiryID = :inquiryID');
            $row = $this->db->resultSet(['userID' => $userID, 'inquiryID' => $inquiryID]);
            return ($row);

        } elseif ($role == "Customer"){
            $this->db->query('SELECT * FROM inquiry INNER JOIN inquiry_message ON inquiryID = inquiry_inquiryID WHERE customerID = :userID AND inquiryID = :inquiryID');
            $row = $this->db->resultSet(['userID' => $userID, 'inquiryID' => $inquiryID]);
            return ($row);
        }

    }

//    public function messageCount($inquiryID){
//        $this->db->query('SELECT MAX(messageID) FROM inquiry_message WHERE inquiry_inquiryID = :inquiryID');
//        $count = $this->db->execute(['inquiryID' => $inquiryID]);
//        return $count;
//    }

    public function sendMessage($data){
        $this->db->query('SELECT MAX(messageID) as countMessages FROM inquiry_message WHERE inquiry_inquiryID = :inquiryID');
        $output = $this->db->single(['inquiryID' => $data[0]]);
        $count = $output->countMessages;
        $messageID = intval($count) + 1;
//        $this->db->query('INSERT INTO inquiry_message (inquiry_inquiryID,sender,message,messageID) VALUES (:inquiryID,:sender,:message,:messageID)');
//        $this->db->execute(['inquiryID' => $data[0],'sender' => $data[2],'message' => $data[1], 'messageID' => $messageCount+1]);

        $this->db->query('INSERT INTO inquiry_message (inquiry_inquiryID,messageID,sender,message) VALUES (:inquiryID,:messageID,:sender,:message)');
        $this->db->execute(['inquiryID' => $data[0],'message' => $data[1],'sender' =>$data[2],'messageID'=>$messageID]);
    }
}
