<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Inquiry extends Controller {
    public function __construct(){ 
        $this->inquiryModel = $this->model('InquiryModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $customer_Id = $this->inquiryModel->getUserID([$_SESSION['user_email']]);
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
        $customer_Id = $this->inquiryModel->getUserID([$_SESSION['user_email']]);
        // print_r($_POST);die();
        $topic = $_POST['topic-box'];
        $type = $_POST['inquiry-type'];
        $message = $_POST['msg-box'];
        // $response = $_POST['response'];
        
        $inputs = array($customer_Id,$topic,$type,$message);
        $this->inquiryModel->addInquiry($inputs);

    }
          // * * * * salesperson functions * * * *

    public function getSalespersonInquiries(){
        if(!isLoggedIn()){
            redirect('login');
        }
        $rows  = $this->inquiryModel->getSalespersonInquiries();
        $_SESSION['rows'] = $rows;
        $data = [
            'title' => 'eZolar View Inquiries',
        ];
        $this->view('Salesperson/inquiries', $data);
    
        }

    public function viewInquiry($inquiryID){
        if(!isLoggedIn()){
            redirect('login');
        }
        $rows  = $this->inquiryModel->viewInquiries($inquiryID);
        $_SESSION['rows'] = $rows;
        $data = [
            'title' => 'eZolar respond Inquiries',
        ];
        $this->view('Salesperson/respond-inquiries', $data);
    }

    public function respondInquiry($inquiryID){
        if(!isLoggedIn()){
            redirect('login');
        }

        $salesperson_Id = $this->inquiryModel->getUserID([$_SESSION['user_email']]);
        $response = $_POST['response'];

        $inputs = array($response,$salesperson_Id);
        $this->inquiryModel->respondInquiries($inquiryID,$inputs);

        redirect("Inquiry/getSalespersonInquiries");
    }


  }