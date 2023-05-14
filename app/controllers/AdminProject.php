<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));

class AdminProject extends Controller
{

  public function __construct()
  {
    $this->AdminProjectModel = $this->model('AdminProjectModel');
    $this->InventoryModel = $this->model('InventoryModel');
    $this->engineerProjectModel = $this->model('EngineerProjectModel');
    $this->PackageModel = $this->model('PackageModel');
    $this->EmployeeModel = $this->model('EmployeeModel');
  }

  private function getProjectStatusName($status){
    $names = array('A0'=>'Request Recieved','A1'=>'Awaiting Payment Verification','A2'=>'Inspection Payment Verified','B0'=>'Inspection Dates Selection', 'C0'=>'Awaiting Inspection', 'C1'=>'Package Confirmed','D0'=>'Payment Verification',
    'D1'=>'Delivery Dates Selection','E0'=>'Awaiting Delivery','X0'=>'Project Cancelled','Z0'=>'Project Completed');
    if (array_key_exists($status,$names)){
      return $names[$status];
    } else {
      return "Invalid Status";
    }
  }

  public function index()
  {

    if (!isLoggedIn()) {
      redirect('login');
    }

    $rows = $this->AdminProjectModel->getProjects();
  
    $_SESSION['rows'] = array('priority'=>[],'ongoing'=>[],'finished'=>[]);
    foreach ($rows as $project){
      if (($project->status == "X0")||($project->status == "Z0")){
        $_SESSION['rows']['finished'][] = $project;
      } else {
        $_SESSION['rows']['ongoing'][] = $project;
      }
    }
    foreach ($_SESSION['rows'] as $key => $sub_arrays){
      foreach ($sub_arrays as $index=>$project){
        foreach($rows as $newindex=>$newproject){
          if ($project->projectID == $newproject->projectID){
            unset($rows[$newindex]);
          }
        }
      }
    }
    $_SESSION['rows']['priority'] = array_merge($rows,$_SESSION['rows']['priority']);
    foreach ($_SESSION['rows'] as $key => $sub_arrays){
      foreach ($sub_arrays as $index=>$project){
        $_SESSION['rows'][$key][$index]->status = $this->getProjectStatusName($project->status);
      }
    }
    $data = [
      'title' => 'eZolar Project',
    ];
    $this->view('Admin/projects', $data);
  }

  // ge the project details
  public function projectDetailsPage($prjID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $eng_Id = $this->AdminProjectModel->getUserID([$_SESSION['user_email']]);
    $row = $this->AdminProjectModel->getAssignedProjectDetails($prjID);
    // print_r($row);die;
    if ($row->Salesperson_Employee_empID == ''){
      $row->Salesperson_Employee_empID = 'Not Assigned';
    }
    if($this->AdminProjectModel->checkModifiedPackage($prjID)){
      $row->Package_packageID .= ' (Modified)';
    }
    else if ($row->Package_packageID  == ''){
      $row->Package_packageID  = 'Not Assigned';
    }

    $_SESSION['row'] = $row;

    $insDates =  $this->AdminProjectModel->getAssignedDates($row->projectID,"Inspection");
    $delDates = $this->AdminProjectModel->getAssignedDates($row->projectID,"Delivery");

    $insDatesStr = "";
    $delDatesStr = "";
    if (count($insDates)<1){
      $insDatesStr = "Not Scheduled";
    }else {
      foreach ($insDates as $item){
        if ((int)$this->AdminProjectModel->checkSchduleConfirmed($item->scheduleID)){
          $insDatesStr .= substr($item->date,0,10)." , ";
        } else {
          $insDatesStr .= '<i title="Not confirmed">'.substr($item->date,0,10)." </i>, ";
        }
      };
      $insDatesStr = substr_replace($insDatesStr, "", -2,2);
    }

    if (count($delDates)<1){
      $delDatesStr = "Not Scheduled";
    }else {
      foreach ($delDates as $item){
        // get the first 10 digits of string
        $delDatesStr .= substr($item->date,0,10)." , ";
      };
      $delDatesStr = substr_replace($delDatesStr, "", -2,2);
    }

    $EngNames = $this->AdminProjectModel->getEngName($row->projectID);
    $EngNamesStr = "";
    if (count($EngNames)<1){
      $EngNamesStr = "Not Assigned";
    }else {
      foreach ($EngNames as $item){
        $EngNamesStr .= $item->name ." , ";
      };
      $EngNamesStr = substr_replace($EngNamesStr, "", -2,2);
    }

    $ContrNames = $this->AdminProjectModel->getContrName($row->projectID);
    $ContrNamesStr = "";
    if (count($ContrNames)<1){
      $ContrNamesStr = "Not Assigned";
    }else {
      foreach ($ContrNames as $item){
        $ContrNamesStr .= $item->name ." , ";
      };
      $ContrNamesStr = substr_replace($ContrNamesStr, "", -2,2);
    }

    $SalesNames = $this->AdminProjectModel->getSalesPresonName($row->projectID);
    $SalesNamesStr = "";
    if (count($SalesNames)<1){
      $SalesNamesStr = "Not Assigned";
    }else {
      foreach ($SalesNames as $item){
        $SalesNamesStr .= $item->name ." , ";
      };
      $SalesNamesStr = substr_replace($SalesNamesStr, "", -2,2);
    }

    $_SESSION['rows'] = array("InspectDates" => $insDatesStr, "DeliverDates" => $delDatesStr, "StatusName" => $this->getProjectStatusName($row->status), "EngineerNames"=>$EngNamesStr, "ContractorNames"=>$ContrNamesStr, "SalespersonName"=>$SalesNamesStr);


    $data = [
      'title' => 'eZolar Assigned Project Details',
    ];
    $this->view('Admin/project-details', $data);

  }

  public function projectPackageDetailsPage($projectID){
    if(!isLoggedIn()){

      redirect('login');
    }
    if($this->engineerProjectModel->checkModifiedPackage($projectID)){
      $packageInfo = $this->engineerProjectModel->getModifiedPackageInfo($projectID);
      $packageContent = $this->engineerProjectModel->getModifiedPackageContent($projectID);
      $packageExtra = $this->engineerProjectModel->getModifiedPackageExtras($projectID);

      $_SESSION['PackMod'] = array('Info' => $packageInfo,'Content' => $packageContent, 'Extras' => $packageExtra);
    } else {
      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $packID = $this->engineerProjectModel->getAssignedProjectDetails($eng_Id,$projectID)->Package_packageID;
      $packageInfo = $this->PackageModel->getPackageDetails($packID);
      $packageInfo->projectID = $projectID;
      $packageContent = $this->PackageModel->getPackageContent($packID);
      $packageExtra = [];

      $_SESSION['PackMod'] = array('Info' => $packageInfo,'Content' => $packageContent, 'Extras' => $packageExtra);
    }
    $data = [
      'title' => 'eZolar Pacakge details',
    ];
    $this->view('Admin/project-package-details', $data);
  }

  // changing assigned employees -> Salesperson, Engineer, Contactor
  public function changeEmployees($projectID){
    if(!isLoggedIn()){
      redirect('login');
    }
    $salesInfo = $this->AdminProjectModel->getSalesperson($projectID);
    $engInfo = $this->AdminProjectModel->getEngineer($projectID);
    $contrInfo = $this->AdminProjectModel->getContractor($projectID);

    $_SESSION['rows'] = array('salesperson' => $salesInfo,'engineer' => $engInfo, 'contractor' => $contrInfo);

    // Retrieve data from the database, e.g.
    $sp = $this->AdminProjectModel->getAllSalesperson();
    $eng = $this->AdminProjectModel->getAllEngineers();
    $ctr = $this->AdminProjectModel->getAllContractors();

    // Pass data to the view
    $_SESSION['projectID'] = $projectID;
    $_SESSION['employees'] = array('allSalespersons' => $sp,'allEngs' => $eng, 'allContractor' => $ctr);

    $data = [
      'title' => 'Employee Details',
    ];
    $this->view('Admin/assigned-employees', $data);
  }

  public function updateSalesperson($projectID){
    $spID = $_POST['sp'];
    $this->AdminProjectModel->reAssignSalesperson($projectID,$spID);
    redirect('AdminProject/changeEmployees/'.$projectID);
  }

  public function updateEngineer($projectID){
    $engID = $_POST['eng'];
    $this->AdminProjectModel->reAssignEngineer($projectID,$engID);
    redirect('AdminProject/changeEmployees/'.$projectID);
  }

  public function updateContractor($projectID){
    $contrID = $_POST['contr'];
    $this->AdminProjectModel->reAssignContractor($projectID,$contrID);
    redirect('AdminProject/changeEmployees/'.$projectID);
  }

  public function paymentHistory($projectID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $_SESSION['projectID'] = $projectID;
    $rows = $this->AdminProjectModel->getPaymentHistory($projectID);

    foreach ($rows as $index=>$receipt){
      if ($receipt->verifiedDate == ''){
        $rows[$index]->verifiedDate = 'Not Veriefied';
      }
    }
    $_SESSION['rows'] = $rows;
    $data = [
      'title' => 'eZolar Project\'s Payment History',
    ];
    $this->view('Admin/payment-history', $data);
  }

  public function viewReceipt($receiptID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $receipt = $this->AdminProjectModel->getReceipt($receiptID);
    if ($receipt->verifiedDate == '') $receipt->verifiedDate = 'Not Verified';
    $_SESSION['row'] = $receipt;
    $data = [
      'title' => 'eZolar View Receipt',
    ];
    $this->view('Admin/view-receipt', $data);
  }
}

