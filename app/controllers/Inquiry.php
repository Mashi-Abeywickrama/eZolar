<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Inquiry extends Controller {
    public function __construct(){ 
        $this->inquiryModel = $this->model('InquiryModel');
        $this->userModel = $this->model('UserModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $customer_Id = $this->userModel->getUserID2([$_SESSION['user_email']]);
      // print_r($customer_Id);die;
      $rows  = $this->inquiryModel-> getAllInquiries($customer_Id);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Inquiry',
      ];
      $this->view('Customer/inquiry', $data);
    }
    public function newInquiryPage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar NewInquiry',
      ];
      $this->view('Customer/newinquiry', $data);

    }
    public function newInquiry(){
      if(!isLoggedIn()){

        redirect('login');
      }
      // print_r($_SESSION['user_email']);die();
      $customer_Id = $this->userModel->getUserID2([$_SESSION['user_email']]);
        // print_r($_POST);die();
        $topic = $_POST['topic-box'];
        $type = $_POST['inquiry-type'];
        $message = $_POST['msg-box'];
        // $response = $_POST['response'];
        
        $inputs = array($customer_Id,$topic,$type,$message);
        $this->inquiryModel->addInquiry($inputs);

    }
    public function viewInquiry($id){
      // print_r($id);die();
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar NewInquiry',
      ];
      $rows = $this->inquiryModel->viewMore($id);
      $_SESSION['rows'] = $rows;
      $this->view('Customer/viewinquiry', $data);
      // print_r($_SESSION['rows']);die;


    }
          // * * * * salesperson functions * * * *
    public function viewSalesperson(){
        if(!isLoggedIn()){

            redirect('login');
        }

        $rows  = $this->inquiryModel-> getSalespersonInquiries();
        $_SESSION['rows'] = $rows;
        $data = [
            'title' => 'eZolar View Inquiries',
        ];
        $this->view('Salesperson/inquiries', $data);

    }
  }