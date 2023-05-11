<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP   ;
require '../vendor/autoload.php';

  class Login extends Controller {
    public function __construct(){ 
      $this->userModel = $this->model('UserModel');
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
            $mail->Username = 'ezolarteam@gmail.com';
            $mail->Password = 'pydosfncorutffbj';
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
        print_r($_POST['otp']);
        print_r($_SESSION['token']);die;
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
      // print_r($_POST['otp'] . " " .$_SESSION['token']);die();

      if (!isset($_POST['OTPBtn'])) {
        header("Location: ./forgotpassword");
        exit;
    }


    if($_POST['otp'] == $_SESSION['token']){
        header('Location: ./newpassword');

    }
    else {
        $_SESSION['error'] = 'Verification failed try again';
        header('Location: ./enterOTP');
    }
      $data = [
        'title' => 'eZolar Reset Password',
      ];
      $this->view('Customer/Settings/resetPassword', $data); 
    }

    public function newpassword()
    {
      $data = [
        'title' => 'eZolar New Password',
      ];
      $this->view('Customer/Settings/resetPassword', $data); 
    }

    public function pwd_set(){
      // print_r($_SESSION['email_reset']);die;
      $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
      if ($_POST['password'] == $_POST['cpassword']) {
        if($this->userModel->updatePassword($_SESSION['email_reset'],$pwd)){
          redirect('/user/logout');
        }
        else{
          redirect('/user/logout');
            // print_r('false');die();
        };
    }
    else{
        $_SESSION['error'] = 'Passwords dont match';
        header('Location:');
    }
    }
  }