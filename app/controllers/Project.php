<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\app\helpers\session_helper.php');

class Project extends Controller
{

  public function __construct()
  {

    // $this->projectModel = new ProductModel();
    $this->projectModel = $this->model('ProjectModel');
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
    $this->projectModel->addNewRequest($customer_Id, $_POST, $filename);
  }
  public function projectdetails($id)
  {
    if (!isLoggedIn()) {

      redirect('login');
    }
    $project = $this->projectModel->getProjectDetails($_GET['project_id']);
    $contractor = $this->projectModel->getContractorDetails($_GET['project_id']);
    $salesperson = $this->projectModel->getSalesPersonDetails($_GET['project_id']);
    $inspectionpayment = $this->projectModel->getInspectionPayment($_GET['project_id']);
    $schedule = $this->projectModel->getSchedule($_GET['project_id']);
    $engineer = $this->projectModel->getEngineer($_GET['project_id']);
    $product = $this->projectModel->getproduct($_GET['project_id']);

    // print_r($product );die();
    // print_r($salesperson );die();
    $data = [
      'title' => 'eZolar Request Project',
      'project' => $project,
      'contractor' => $contractor,
      'salesperson' => $salesperson,
      'inspectionpayment' => $inspectionpayment,
      'schedule' => $schedule,
      'engineer' => $engineer,
      'product' => $product
    ];
    if ($id == 1) {
      $this->view('Customer/projects/projectdetails', $data);
    } else if ($id == 2) {
      $this->view('Customer/projects/projectdetails2', $data);
    } else if ($id == 3) {
      $this->view('Customer/projects/projectdetails3', $data);
    } else if ($id == 4) {
      $this->view('Customer/projects/projectdetails4', $data);
    } else if ($id == 5) {
      $this->view('Customer/projects/projectdetails5', $data);
    }



  }

  public function scheduleDate()
  {
    // print_r($_POST);die();
    $res = $this->projectModel->addNewScheduleItem($_GET['project_id'], $_POST['d1'], $_POST['d2'], $_POST['d3']);
    if ($res) {
      redirect('project/projectdetails/2?project_id=' . $_GET['project_id']);
      // $dlink = 'project/projectdetails/2?project_id=' . $_GET['project_id'];
      // $dates= array( $_POST['d1'], $_POST['d2'], $_POST['d3']);
      // $data = base64_encode(serialize(array($_GET['project_id'],$dates,$dlink)));
      // redirect('AutoAssign/engAssign/'.$data);
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

    $rows = $this->projectModel->getContractorProjects($this->projectModel->getUserID([$_SESSION['user_email']]));
    // print_r($rows);die;
    $_SESSION['rows'] = $rows;
    $data = [
      'title' => 'eZolar COntractor Assigned Projects',
    ];
    $this->view('Contractor/assignedProjects', $data);
  }

}