<?php
  class Inquiry extends Controller {
    public function __construct(){ 
        $this->inquiryModel = $this->model('InquiryModel');
    }
    
    public function index(){
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
      $data = [
        'title' => 'eZolar NewInquiry',
      ];
      $this->view('Customer/newinquiry', $data);

    }
    public function newInquiry(){
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

  }