<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Transaction extends Controller {
    
    public function __construct(){ 
    
        // $this->projectModel = new ProductModel();
        $this->transactionModel = $this->model('TransactionModel');
        $this->projectModel = $this->model('projectModel');
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
    public function transactionDetails($id){
      // print_r($id);die();
      if(!isLoggedIn()){

        redirect('login');
      }
      
      $rows = $this->transactionModel->viewMore($id);
      // print_r($rows);die;
      $projectID = $rows[0]->Project_projectID;
      $product = $this->projectModel->getproduct($projectID);
      $data = [
        'title' => 'eZolar Transactions',
        'transcaction' => $rows,
        'product' => $product,
      ];
      
      $this->view('Customer/transactionDetails', $data);
      // print_r($data);die;


    }
  }
  ?>