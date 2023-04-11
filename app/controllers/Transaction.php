<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Transaction extends Controller {
    
    public function __construct(){ 
    
        // $this->projectModel = new ProductModel();
        $this->transactionModel = $this->model('TransactionModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $customer_Id = $this->transactionModel->getUserID([$_SESSION['user_email']]);
      // print_r($customer_Id);die;
      $rows  = $this->transactionModel-> getAllPayments($customer_Id);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Project',
      ];
      $this->view('Customer/transactions', $data);
    }
  }
  ?>