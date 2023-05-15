<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\app\helpers\session_helper.php');

class Project extends Controller
{

  public function __construct()
  {

    
    $this->projectModel = $this->model('ProjectModel');
    $this->userModel = $this->model('userModel');
  }

  public function index()
  {

    if (!isLoggedIn()) {

      redirect('login');
    }

    $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
    // print_r($customer_Id);die;
    $rows = $this->projectModel->getAllProjects($customer_Id);
    $_SESSION['rows'] = $rows;
    $data = [
      'title' => 'eZolar Project',
    ];
    $this->view('Customer/projects/ongoingProject', $data);
  }
  public function cancelledProjects()
  {

    if (!isLoggedIn()) {

      redirect('login');
    }

    $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
    // print_r($customer_Id);die;
    $rows = $this->projectModel->getCancelledProjects($customer_Id);
    // $_SESSION['rows'] = $rows;
    $data = [
      'title' => 'eZolar Project',
      'rows' => $rows
    ];
    $this->view('Customer/projects/cancelledProject', $data);
  }
  public function completedProjects()
  {

    if (!isLoggedIn()) {

      redirect('login');
    }

    $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
    // print_r($customer_Id);die;
    $rows = $this->projectModel->getCompletedProjects($customer_Id);
    // $_SESSION['rows'] = $rows;
    $data = [
      'title' => 'eZolar Project',
      'rows' => $rows
    ];
    $this->view('Customer/projects/completedProject', $data);
  }

  public function requestProjectPage()
  {
    if (!isLoggedIn()) {

      redirect('login');
    }
    $data = [
      'title' => 'eZolar Request Project',
    ];
    $this->view('Customer/requestproject', $data);

  }

  public function paymentRecieptUpload(){
    $target_dir = "C:/xampp/htdocs/ezolar/public/img/payments/";
    $file_upload = false;
    // Checking whether a file is uploaded
    if ($_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {
      $filename = basename($_FILES["fileToUpload"]["name"]);
      $file_upload = true;
    }
    $randnumber = rand(10000,99999);
    $target_file = $target_dir . $randnumber.$filename;
    $filena = $randnumber.$filename;


    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($file_upload) {
      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      // Allow certain file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
    }
    return $filena;
  }
  public function requestProject()
  {
    if (!isLoggedIn()) {

      redirect('login');
    }
    // print_r($_SESSION['user_email']);die();
    $customer_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
    // print_r($_FILES);die();
    //
    $filename = $this->paymentRecieptUpload();
    $salesperson = $this->projectModel->getFreeSalesPerson();
    // print_r($salesperson);die();
    $this->projectModel->addNewRequest($customer_Id, $_POST, $filename,$salesperson);
  }
  public function projectdetails($id)
  {
    if (!isLoggedIn()) {

      redirect('login');
    }
    $scheEng = $this->projectModel->getEngCount($_GET['project_id']);
    
    if (empty($scheEng)) {
      $scheduleEngCheck = $this->projectModel->getScheduleDetails($_GET['project_id']);
      
    if ($scheduleEngCheck == -3) {
      $schedule = $this->projectModel->getSchedule($_GET['project_id']);
      $schedule = $schedule[0]->scheduleID;
      
      $scheduleDates = $this->projectModel->getScheduleDates($_GET['project_id']);
      
      $check = $this->projectModel->checkEngineer($scheduleDates[0]->requested_date);
      
      if ($check == -1) {
        $check2 = $this->projectModel->checkEngineer($scheduleDates[1]->requested_date);
        if ($check2 == -1) {
          $check3 = $this->projectModel->checkEngineer($scheduleDates[2]->requested_date);
          if ($check3 == -1) {
            $results = $this->projectModel->rejectSchedule($schedule);
          } else {
            $results = $this->projectModel->addNewScheduleEng($schedule, $check3, $scheduleDates[2]->requested_date);
          }
          
        }else{
          $results = $this->projectModel->addNewScheduleEng($schedule, $check2, $scheduleDates[1]->requested_date);
        }
      }
      else{
        $results = $this->projectModel->addNewScheduleEng($schedule, $check, $scheduleDates[0]->requested_date);
      }
    }else if ($scheduleEngCheck > 0){
        $results = $this->projectModel->addEng($_GET['project_id'],$scheduleEngCheck);

    }
    }

    $scheContr = $this->projectModel->getConCount($_GET['project_id']);

    if (empty($scheContr)) {
      $scheduleConCheck = $this->projectModel->getDeliveryScheduleDetails($_GET['project_id']);
      
    if ($scheduleConCheck == -3) {
      $schedule = $this->projectModel->getdSchedule($_GET['project_id']);
      $schedule = $schedule[0]->scheduleID;
      
      $scheduleDates = $this->projectModel->getDeliveryScheduleDates($_GET['project_id']);
      
      $check = $this->projectModel->checkContractor($scheduleDates[0]->requested_date);
      
      if ($check == -1) {
        $check2 = $this->projectModel->checkContractor($scheduleDates[1]->requested_date);
        if ($check2 == -1) {
          $check3 = $this->projectModel->checkContractor($scheduleDates[2]->requested_date);
          if ($check3 == -1) {
            $results = $this->projectModel->rejectSchedule($schedule);
          } else {
            $results = $this->projectModel->addNewScheduleCon($schedule, $check3, $scheduleDates[2]->requested_date);
          }
          
        }else{
          $results = $this->projectModel->addNewScheduleCon($schedule, $check2, $scheduleDates[1]->requested_date);
        }
      }
      else{
        $results = $this->projectModel->addNewScheduleCon($schedule, $check, $scheduleDates[0]->requested_date);
      }
    }else if ($scheduleConCheck > 0){
        $results = $this->projectModel->addCon($_GET['project_id'],$scheduleConCheck);

    }
    }
 
    $project = $this->projectModel->getProjectDetails($_GET['project_id']);
    $contractor = $this->projectModel->getContractorDetails($_GET['project_id']);
    $salesperson = $this->projectModel->getSalesPersonDetails($_GET['project_id']);
    $inspectionpayment = $this->projectModel->getInspectionPayment($_GET['project_id']);
    $deliverypayment = $this->projectModel->getDeliveryPayment($_GET['project_id']);
    $schedule = $this->projectModel->getSchedule($_GET['project_id']);
    $engineer = $this->projectModel->getEngineer($_GET['project_id']);
    $product = $this->projectModel->getproduct($_GET['project_id']);
    $extra = $this->projectModel->getExtraItems($_GET['project_id']);
    // print_r($extra);die();
    $dschedule = $this->projectModel->getdSchedule($_GET['project_id']);
    $productname =  $this->projectModel->getproductname($_GET['project_id']);
    
    // print_r($productname );die();
    // print_r($salesperson );die();
    $data = [
      'title' => 'eZolar Request Project',
      'project' => $project,
      'contractor' => $contractor,
      'salesperson' => $salesperson,
      'inspectionpayment' => $inspectionpayment,
      'schedule' => $schedule,
      'engineer' => $engineer,
      'product' => $product,
      'dschedule' => $dschedule,
      'deliverypayment' => $deliverypayment,
      'productname' => $productname,
      'extra' => $extra,
    ];
    if ($id == 1) {
      $this->view('Customer/projects/projectdetails', $data);
    } else if ($id == 2) {
      if ($project[0]->status == "A0" || $project[0]->status == "A1" || $project[0]->status == "A2") {
        redirect('project/projectdetails/1?project_id=' . $_GET['project_id']);
      }
      $this->view('Customer/projects/projectdetails2', $data);
    } else if ($id == 3) {
      if ($project[0]->status == "A0" || $project[0]->status == "A1" || $project[0]->status == "A2"|| $project[0]->status == "B0" || $project[0]->status == "B1" || $project[0]->status == "B2"){
        redirect('project/projectdetails/1?project_id=' . $_GET['project_id']);
      }
      $this->view('Customer/projects/projectdetails3', $data);
    } else if ($id == 4) {
      if ($project[0]->status == "A0" || $project[0]->status == "A1" || $project[0]->status == "A2"|| $project[0]->status == "B0" || $project[0]->status == "B1" || $project[0]->status == "B2" || $project[0]->status == "C0" || $project[0]->status == "C1" || $project[0]->status == "C2" || $project[0]->status == "F"){
        redirect('project/projectdetails/1?project_id=' . $_GET['project_id']);
      }
      $this->view('Customer/projects/projectdetails4', $data);
    } else if ($id == 5) {
      if ($project[0]->status == "A0" || $project[0]->status == "A1" || $project[0]->status == "A2"|| $project[0]->status == "B0" || $project[0]->status == "B1" || $project[0]->status == "B2" || $project[0]->status == "C0" || $project[0]->status == "C1" || $project[0]->status == "C2" || $project[0]->status == "D0" || $project[0]->status == "D1" || $project[0]->status == "D2" || $project[0]->status == "F"){
        redirect('project/projectdetails/1?project_id=' . $_GET['project_id']);
      }
      $this->view('Customer/projects/projectdetails5', $data);
    }



  }

  public function scheduleDate()
  {
    // print_r($_POST);die();
    $schedule = $this->projectModel->addNewScheduleItem($_GET['project_id'], $_POST['d1'], $_POST['d2'], $_POST['d3']);
    $check = $this->projectModel->checkEngineer($_POST['d1']);
    if ($check == -1) {
       $check2 = $this->projectModel->checkEngineer($_POST['d2']);
       if ($check2 == -1) {
        $check3 = $this->projectModel->checkEngineer($_POST['d3']);
        if ($check3 == -1) {
          $results = $this->projectModel->rejectSchedule($schedule);
        } else {
          $results = $this->projectModel->addNewScheduleEng($schedule, $check3, $_POST['d3']);
        }
        
      }else{
         $results = $this->projectModel->addNewScheduleEng($schedule, $check2, $_POST['d2']);
      }
    }
    else{
      $results = $this->projectModel->addNewScheduleEng($schedule, $check, $_POST['d1']);
    }
    // print_r($check);die();
    if ($results) {
      redirect('project/projectdetails/2?project_id=' . $_GET['project_id']);
      // $dlink = 'project/projectdetails/2?project_id=' . $_GET['project_id'];
      // $dates= array( $_POST['d1'], $_POST['d2'], $_POST['d3']);
      // $data = base64_encode(serialize(array($_GET['project_id'],$dates,$dlink)));
      // redirect('AutoAssign/engAssign/'.$data);
    }


  }

  public function scheduleDeliveryDate()
  {
    // print_r($_POST);die();
    $schedule = $this->projectModel->addNewDeliveryScheduleItem($_GET['project_id'], $_POST['d1'], $_POST['d2'], $_POST['d3']);
    // print_r($schedule);die();
    // $schedule = 55;
    if ($schedule) {
      $check = $this->projectModel->checkContractor($_POST['d1']);
    // print_r($check);die();
    if ($check == -1) {
       $check2 = $this->projectModel->checkContractor($_POST['d2']);
       if ($check2 == -1) {
        $check3 = $this->projectModel->checkContractor($_POST['d3']);
        if ($check3 == -1) {
          $results = $this->projectModel->rejectSchedule($schedule);
        } else {
          $results = $this->projectModel->addNewScheduleCon($schedule, $check3, $_POST['d3']);
        }
        
      }else{
         $results = $this->projectModel->addNewScheduleCon($schedule, $check2, $_POST['d2']);
      }
    }
    else{
      // print_r($schedule . $check . $_POST['d1']);die();
      $results = $this->projectModel->addNewScheduleCon($schedule, $check, $_POST['d1']);
    }
    if ($results) {
      redirect('project/projectdetails/4?project_id=' . $_GET['project_id']);
    }
    else {
      print_r($results);
    }
    }
    
    


  }

  public function scheduleDateUpdate()
  {
    $res = $this->projectModel->UpdateScheduleItem($_GET['project_id'], $_POST['d1'], $_POST['d2'], $_POST['d3']);
    if ($res) {
      redirect('project/projectdetails/2?project_id=' . $_GET['project_id']);
    }
    // print_r($_POST);die();
  }

  public function cancelProduct()
  {
    $res = $this->projectModel->cancelProduct($_GET['project_id']);
    if ($res) {
      redirect('project/projectdetails/3?project_id=' . $_GET['project_id']);
    }
  }

  public function confirmOrder(){
    $filename = $this->paymentRecieptUpload();
    if ($filename) {
      $res = $this->projectModel->confirmOrder($_GET['project_id'],$filename);
      if ($res) {
        redirect('project/projectdetails/4?project_id=' . $_GET['project_id']);
      }
    }
    
    
  }
  // salesperson functions

  public function SalespersonViewProjects()
  {

    //          $salesperson_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
//          $rowsAssigned  = $this->projectModel->getSalespersonAssignedProjects($salesperson_Id);
//          $_SESSION['rowsAssigned'] = $rowsAssigned;

    $rows = $this->projectModel->SalespersonViewProjects();
    $_SESSION['rows'] = $rows;

    $data = [
      'title' => 'eZolar Salesperson Assigned Projects',
    ];
    $this->view('Salesperson/assigned-projects', $data);
  }

  public function salespersonAssignedProject($projectID)
  {

    if (!isLoggedIn()) {
      redirect('login');
    }
    $salesperson_Id = $this->projectModel->getUserID([$_SESSION['user_email']]);
    $this->projectModel->salespersonAssignedProject($salesperson_Id, $projectID);
    redirect('Project/SalespersonViewProjects');
  }

  public function getProjectDetails($projectID)
  {
    if (!isLoggedIn()) {
      redirect('login');
    }
    $this->projectModel->getProjectDetails($projectID);
    $data = [
      'title' => 'eZolar Salesperson Assigned Projects',
    ];
    $this->view('Salesperson/project-details', $data);
  }

  public function COntractorAssignedProjects()
  
  {
    
    if (isset($_GET['project_id'])) {
      $product = $this->projectModel->getproduct($_GET['project_id']);
    }
    if (isset($_GET['projectid'])) {
      $project = $this->projectModel->getProjectDetailsCustomer($_GET['projectid']);
      $salesperson = $this->projectModel->getSalesPersonDetails($_GET['projectid']);
      $schedule = $this->projectModel->getdSchedule($_GET['projectid']);
      // print_r($salesperson);die();
      $engineer = $this->projectModel->getEngineer($_GET['projectid']);
      $data = [
        'title' => 'eZolar COntractor Assigned Projects',
        'project' => $project,
        'schedule' => $schedule,
        'salesperson' => $salesperson,
        'engineer' => $engineer

      ];
    }
    

    $rows = $this->projectModel->getContractorProjects($this->projectModel->getUserID([$_SESSION['user_email']]));
    // print_r($rows);die;
    $_SESSION['rows'] = $rows;
    
    if (isset($_GET['project_id'])) {
      $data = [
        'title' => 'eZolar COntractor Assigned Projects',
        'product' => $product,
        'rows' => $rows
      ];
    }
    if(!isset($_GET['project_id']) && !isset($_GET['projectid'])){
      $data = [
        'title' => 'eZolar COntractor Assigned Projects',
        'rows' => $rows
      ];
    }
    $this->view('Contractor/acceptedProjects', $data);
  }

  public function markascomplete()
  {
    if (!isLoggedIn()) {
      redirect('login');
    }
    $this->projectModel->markAsComplete($_GET['projectid']);
    $data = [
      'title' => 'eZolar Assigned Projects',
    ];
    redirect('Project/COntractorAssignedProjects');
  }

  public function troubleshoot(){
    if (!isLoggedIn()) {
      redirect('login');
    }
    $rows = $this->projectModel->getTroubleshootReq($this->projectModel->getUserID([$_SESSION['user_email']]));
    // print_r($rows);die();

    $data = [
      'title' => 'eZolar Troubleshoot',
      'rows' => $rows
    ];
    if ($this->userModel->getUserRole($_SESSION['user_email'])=='Customer'){
      $this->view('Customer/troubleshoot', $data);
    }
    else{
    $this->view('Customer/error', 'Access Denied');
    }
    
  }
  public function troubleshootdetails($projectID){
    if (!isLoggedIn()) {
      redirect('login');
    }
    $rows = $this->projectModel->getTroubleshootDetails($projectID);
    // print_r($rows[0]->scheduleID);die();
    $salesperson = $this->projectModel->getSalesPersonDetails($projectID);
    $engineer = $this->projectModel->getTroubleshootEngineer($rows[0]->scheduleID);
    // print_r($engineer);die();
    $data = [
      'title' => 'eZolar Troubleshoot',
      'rows' => $rows,
      'salesperson' => $salesperson,
      'engineer' => $engineer
    ];
    if ($this->userModel->getUserRole($_SESSION['user_email'])=='Customer'){
      $this->view('Customer/troubleshootdetails', $data);
    }
    else{
    $this->view('Customer/error', 'Access Denied');
    }
    
  }
}