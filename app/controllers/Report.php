<?php
//   define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Report extends Controller {
    
    public function __construct(){ 
    
        // $this->projectModel = new ProductModel();
        $this->transactionModel = $this->model('TransactionModel');
        $this->userModel = $this->model('userModel');
        $this->projectModel = $this->model('projectModel');
    }

    public function index(){

        if(!isLoggedIn()){
          redirect('login');
        }
        $customer_Id = $this->userModel->getUserID2([$_SESSION['user_email']]);
        $com_projects = $this->projectModel->getCompletedProjects($customer_Id);
        if (empty($com_projects)) {
          $data = [];
          $this->view('Customer/reports', $data);
          exit();
        }
        if (isset($_GET['projectID'])) {
          $projectID = $_GET['projectID'];
          $project = $this->projectModel->getProjectDetails($projectID);
          $productname =  $this->projectModel->getproductname($projectID);
          $products = $this->projectModel->getproduct($projectID);
          $inspection = $this->projectModel->getdSchedule($projectID);
          $delivery = $this->projectModel->getSchedule($projectID);
          $lastpay = $this->transactionModel->getCompletedPayment($projectID);
          $fpayment = $this->transactionModel->getCompletedInspectionPayment($projectID);;
          // print_r($products);die();
        }else{
          $project = $this->projectModel->getProjectDetails($com_projects[0]->projectID);
          $productname =  $this->projectModel->getproductname($com_projects[0]->projectID);
          $inspection = $this->projectModel->getSchedule($com_projects[0]->projectID);
          $delivery = $this->projectModel->getdSchedule($com_projects[0]->projectID);
          $products = $this->projectModel->getproduct($com_projects[0]->projectID);
          $lastpay = $this->transactionModel->getCompletedPayment($com_projects[0]->projectID);
          $fpayment = $this->transactionModel->getCompletedInspectionPayment($com_projects[0]->projectID);;
        }
        
        // print_r($customer_Id);die;
        $transactions  = $this->transactionModel-> getAllPayments($customer_Id);
        // print_r($transactions);die;
        $data = [
          'title' => 'eZolar Project',
          'transactions' => $transactions,
          'com_projects' => $com_projects,
          'project' => $project,
          'products' => $products,
          'lastpay' =>$lastpay,
          'productname' => $productname,
          'fpayment' => $fpayment,
          'inspection' => $inspection,
          'delivery' => $delivery
        ];
        $this->view('Customer/reports', $data);
        // print_r($products);
      }
}
?>