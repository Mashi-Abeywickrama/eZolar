<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

  class Login extends Controller {
    public function __construct(){ 
    }
    
    public function index(){
      $data = [
        'title' => 'eZolar Login',
      ];
     
      $this->view('Includes/header', $data);
      // $this->view('Includes/footer', $data);
      // $this->view('Includes/navbar1', $data);
      $this->view('Authentication/login', $data);
    }
    public function forgotpassword(){
      $data = [
        'title' => 'eZolar Login',
      ];
      if(isset($_POST['emailbtn'])){
            $_SESSION['email_reset'] = $_POST['email'];

        
            $num_str = sprintf("%06d", mt_rand(1, 999999));
            $_SESSION['token'] = $num_str;

            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

            $mail->IsSMTP();  // telling the class to use SMTP
            // $mail->SMTPDebug = 2;
            $mail->Mailer = "smtp";
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'abeywickramaamashi@gmail.com';
            $mail->Password = 'etyfpbypgsrbrknr';
            //From email address and name
            $mail->From = "ezolar.team@gmail.com";
            $mail->FromName = "Ezolar";

            //To address and name
            $mail->addAddress($_POST['email']); //Recipient name is optional                                                                                         

            //Address to which recipient will reply
            $mail->addReplyTo("noreply@ezolar.com", "Ezolar");


            //Send HTML or Plain Text email
            $mail->isHTML(true);

            $mail->Subject = "Reset Password";
            $mail->Body = "<p>Reset Your Password With Provided OTP:$num_str </p>";
            $mail->AltBody = "This is the plain text version of the email content";


            try {
                $mail->send();
                header('Location:/ezolar/login/enterOTP');
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
      }
      if(isset($_POST['OTPBtn'])){
        if($_POST['otp'] == $_SESSION['token']){
          header('Location:/ezolar/login/resetpassword');
        }
        else{
          header('Location:/ezolar/login/forgotPassword');
        }
      }
      $this->view('Authentication/forgotPassword', $data); 
    }

    public function enterOTP()
    {
      $data = [
        'title' => 'eZolar Reset Password',
      ];
      $this->view('Authentication/OTPpage', $data); 
    }

    public function resetpassword()
    {
      $data = [
        'title' => 'eZolar Reset Password',
      ];
      $this->view('Customer/Settings/resetPassword', $data); 
    }

  }