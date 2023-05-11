<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
// require_once(__ROOT__.'\app\helpers\session_helper.php');

class SalespersonProject extends Controller
{

  public function __construct()
  {
    $this->SalespersonProjectModel = $this->model('SalespersonProjectModel');
    $this->InventoryModel = $this->model('InventoryModel');
    $this->engineerProjectModel = $this->model('EngineerProjectModel');
    $this->PackageModel = $this->model('PackageModel');
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

    $SP_Id = $this->SalespersonProjectModel->getUserID([$_SESSION['user_email']]);
    $rows = $this->SalespersonProjectModel->getAssignedProjects($SP_Id);
    
    $_SESSION['rows'] = array('priority'=>[],'ongoing'=>[],'finished'=>[]);
    foreach ($rows as $project){
      if (($project->status == "A1")||($project->status == "D0")){
        $_SESSION['rows']['priority'][] = $project;
      } else if (($project->status == "X0")||($project->status == "Z0")){
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
    $data = [
      'title' => 'eZolar Project',
    ];
    $this->view('Salesperson/assigned-projects', $data);
  }

  public function projectDetailsPage($prjID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $eng_Id = $this->SalespersonProjectModel->getUserID([$_SESSION['user_email']]);
    $row = $this->SalespersonProjectModel->getAssignedProjectDetails($prjID);
    // print_r($row);die;
    if ($row->Salesperson_Employee_empID == ''){
      $row->Salesperson_Employee_empID = 'Not Assigned';
    }
    if($this->SalespersonProjectModel->checkModifiedPackage($prjID)){
      $row->Package_packageID .= ' (Modified)';
    }
    else if ($row->Package_packageID  == ''){
      $row->Package_packageID  = 'Not Assigned';
    }

    $_SESSION['row'] = $row;

    $insDates =  $this->SalespersonProjectModel->getAssignedDates($row->projectID,"Inspection");
    $delDates = $this->SalespersonProjectModel->getAssignedDates($row->projectID,"Delivery");

    $insDatesStr = "";
    $delDatesStr = "";
    if (count($insDates)<1){
      $insDatesStr = "Not Scheduled";
    }else {
      foreach ($insDates as $item){
        if ((int)$this->SalespersonProjectModel->checkSchduleConfirmed($item->scheduleID)){
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
        $delDatesStr .= substr($item->date,0,10)." , ";
      };
      $delDatesStr = substr_replace($delDatesStr, "", -2,2);
    }

    $EngNames = $this->SalespersonProjectModel->getEngName($row->projectID);
    $EngNamesStr = "";
    if (count($EngNames)<1){
      $EngNamesStr = "Not Assigned";
    }else {
      foreach ($EngNames as $item){
        $EngNamesStr .= substr($item->name,0,10)." , ";
      };
      $EngNamesStr = substr_replace($EngNamesStr, "", -2,2);
    }

    $ContrNames = $this->SalespersonProjectModel->getContrName($row->projectID);
    $ContrNamesStr = "";
    if (count($ContrNames)<1){
      $ContrNamesStr = "Not Assigned";
    }else {
      foreach ($ContrNames as $item){
        $ContrNamesStr .= substr($item->name,0,10)." , ";
      };
      $ContrNamesStr = substr_replace($ContrNamesStr, "", -2,2);
    }


    $_SESSION['rows'] = array("InspectDates" => $insDatesStr, "DeliverDates" => $delDatesStr, "StatusName" => $this->getProjectStatusName($row->status), "EngineerNames"=>$EngNamesStr, "ContractorNames"=>$ContrNamesStr);

    if ($this->SalespersonProjectModel->checkUnverifiedReceipt($prjID)){
      $receipt = $this->SalespersonProjectModel->getReceiptfromProject($prjID);
      $_SESSION['rows']['receipt'] = $receipt;
    }


    $data = [
      'title' => 'eZolar Assigned Project Details',
    ];
    $this->view('Salesperson/project-details', $data);

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
    $this->view('Salesperson/project-package-details', $data);
  }

  public function verifyInspectionPaymentPage($recID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $receipt = $this->SalespersonProjectModel->getReceipt($recID);
    $_SESSION['row'] = $receipt;

    $_SESSION['verifylink'] = "/ezolar/SalespersonProject/verifyPayment/".$recID."/".$receipt->Project_projectID."/"."Inspection"."/";
    
    $data = [
      'title' => 'eZolar Assigned Project Details',
    ];
    $this->view('Salesperson/verify-payment', $data);
  }

  public function verifyFullPaymentPage($recID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $receipt = $this->SalespersonProjectModel->getReceipt($recID);
    $_SESSION['row'] = $receipt;

    $_SESSION['verifylink'] = "/ezolar/SalespersonProject/verifyPayment/".$recID."/".$receipt->Project_projectID."/"."Full"."/";
    
    $data = [
      'title' => 'eZolar Assigned Project Details',
    ];
    $this->view('Salesperson/verify-payment', $data);
  }

  public function verifyPayment($recID,$prjID,$type,$isAccepted){
    if(!isLoggedIn()){

      redirect('login');
    }

    $returnLinkplain = "SalespersonProject/projectDetailsPage/".$prjID;
    $returnLink = base64_encode($returnLinkplain);
    if((int)$isAccepted){
      $this->SalespersonProjectModel->verifyReceipt($recID);
      $this->SalespersonProjectModel->addVerifyDate($recID);
      if($type == "Inspection"){
        $this->SalespersonProjectModel->advanceProject($prjID,'A2');
        redirect($returnLinkplain);
      } else if ($type == "Full") {
        $this->SalespersonProjectModel->advanceProject($prjID,'D1');
        $pack_content = $this->engineerProjectModel->getModifiedPackageContent($prjID);
        foreach ($pack_content as $item){
          $this->InventoryModel->updateInventory($item->productID,$item->productQuantity,"rem");
        }
        redirect('Inventory/checkreorderlevelspublic/'.$returnLink);
      }
    } else {
      $this->SalespersonProjectModel->rejectReceipt($recID);
    }

    


  }

  public function paymentHistory($projectID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $_SESSION['projectID'] = $projectID;
    $rows = $this->SalespersonProjectModel->getPaymentHistory($projectID);

    foreach ($rows as $index=>$receipt){
      if ($receipt->verifiedDate == ''){
        $rows[$index]->verifiedDate = 'Not Veriefied';
      }
    }
    $_SESSION['rows'] = $rows;
    $data = [
      'title' => 'eZolar Project\'s Payment History',
    ];
    $this->view('Salesperson/payment-history', $data);
  }

  public function viewReceipt($receiptID){
    if(!isLoggedIn()){

      redirect('login');
    }
    $receipt = $this->SalespersonProjectModel->getReceipt($receiptID);
    if ($receipt->verifiedDate == '') $receipt->verifiedDate = 'Not Verified';
    $_SESSION['row'] = $receipt;
    $data = [
      'title' => 'eZolar View Receipt',
    ];
    $this->view('Salesperson/view-receipt', $data);
  }
}

