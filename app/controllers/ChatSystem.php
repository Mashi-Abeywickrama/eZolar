<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/app/helpers/session_helper.php');
class ChatSystem extends Controller {
    public function __construct(){
        $this->chatSystemModel = $this->model('ChatSystemModel');
    }

    public function index(){
        if (!isLoggedIn()){
            redirect('login');
        }

    }

    // chat function for salesperson view messages

    public function viewMessages($inquiryID){
        if (!isLoggedIn()){
            redirect('login');
        }

        $userRole = $this->chatSystemModel->getUserRole($_SESSION['user_email']);
        $user_Id = $this->chatSystemModel->getUserID($_SESSION['user_email']);
        $rows  = $this->chatSystemModel-> viewMessages($inquiryID,$user_Id,$userRole);
        $str = "";
        if (!empty($rows)){
            foreach ($rows as $msg){
                if ($userRole == "Salesperson"){
                    if ($msg->sender == 0){
                        $str = $str."<div class='sender-container'>
                        <p id='sender' class='sending-message'>
                        " . $msg -> message . "
                        </p>
                        <p id='date-time' class='date-time'>
                        " .$msg -> time. "
                        </p>
                    </div>";
                    }else{
                        $str = $str."<div class='receiver-container'>
                        <p id='receiver' class='incoming-message'>
                        " . $msg -> message . "
                        </p>
                        <p id='date-time' class='date-time'>
                        " .$msg -> time. "
                        </p>
                    </div>";
                    }
                }elseif ($userRole == "Customer"){
                    if ($msg->sender == 1){
                        $str = $str."<div class='sender-container'>
                        <p id='sender' class='sending-message'>
                        " . $msg -> message . "
                        </p>
                        <p id='date-time' class='date-time'>
                        " .$msg -> time. "
                        </p>
                    </div>";
                    }else{
                        $str = $str."<div class='receiver-container'>
                        <p id='receiver' class='incoming-message'>
                        " . $msg -> message . "
                        </p>
                        <p id='date-time' class='date-time'>
                        " .$msg -> time. "
                        </p>
                    </div>";
                    }
                }


            }
        }



//        echo "<h1>Okayaa</h1>";
//        $rowsNew = json_encode($rows, JSON_UNESCAPED_UNICODE);
//        $_SESSION['rowsNew'] = $rows;

        echo $str;
    }

    // function to salesperson insert messages

    public function sendMessage($inquiryID){
        $message = $_POST['message'];
        if (!empty($message)){
            $user_Type = $this->chatSystemModel->getUserRole($_SESSION['user_email']);

            if ($user_Type == 'Salesperson'){
                $sender = 0;
            }else{
                $sender = 1;
            }

            $inputs = array($inquiryID,$message,$sender);
            $this->chatSystemModel->sendMessage($inputs);
        }


    }



}
?>
