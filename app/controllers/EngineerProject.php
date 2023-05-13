<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class EngineerProject extends Controller {
    
    public function __construct(){ 
        $this->engineerProjectModel = $this->model('EngineerProjectModel');
        $this->PackageModel = $this->model('PackageModel');
        $this->ProductModel = $this->model('ProductModel');
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
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $rows  = $this->engineerProjectModel-> getAssignedProjects($eng_Id);
      $_SESSION['rows'] = array('priority'=>[],'ongoing'=>[],'finished'=>[]);
      foreach ($rows as $project){
        if (($project->status == "C0")||($project->status == "B0")){
          $_SESSION['rows']['priority'][] = $project;
        } else if (($project->status == "Z0")||($project->status == "X0")){
          $_SESSION['rows']['finished'][] = $project;
        } else {
          $_SESSION['rows']['ongoing'][] = $project;
        }
      }

      $rows = $this->engineerProjectModel-> getNewAssignedProjects($eng_Id);
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
        'title' => 'eZolar Assigned Projects',
      ];
      $this->view('Engineer/projects', $data);
    }

    public function projectDetailsPage($prjID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $row = $this->engineerProjectModel->getAssignedProjectDetails($prjID);
      if ($row->Salesperson_Employee_empID == ''){
        $row->Salesperson_Employee_empID = 'Not Assigned';
      } else {
        $row->Salesperson_Employee_empID = $this->engineerProjectModel->getSPname($row->Salesperson_Employee_empID);
      }
      if($this->engineerProjectModel->checkModifiedPackage($prjID)){
        $row->Package_packageID .= ' (Modified)';
      }
      else if ($row->Package_packageID  == ''){
        $row->Package_packageID  = 'Not Assigned';
      }

      $_SESSION['row'] = $row;

      $insDates =  $this->engineerProjectModel->getAssignedDates($row->projectID,"Inspection");
      $delDates = $this->engineerProjectModel->getAssignedDates($row->projectID,"Delivery");

      $insDatesStr = "";
      $delDatesStr = "";
      $unconfirmed = [];
      $inspFlag = FALSE;
      if (count($insDates)<1){
        $insDatesStr = "Not Scheduled";
      }else{
        foreach ($insDates as $item){
          if ((int)$this->engineerProjectModel->checkSchduleConfirmed($item->scheduleID,$eng_Id)){
            $insDatesStr .= substr($item->date,0,10)." , ";
          } else {
            $insDatesStr .= '<i title="Not confirmed">'.substr($item->date,0,10)." </i>, ";
            $unconfirmed[] = $item;
          }
        };
        $insDatesStr = substr_replace($insDatesStr, "", -2,2);
        $firstInspDate = new DateTime(substr($insDates[0]->date,0,10));
        $today = new DateTime();

        if ($firstInspDate<=$today)
          $inspFlag = TRUE;
      }

      if (count($delDates)<1){
        $delDatesStr = "Not Scheduled";
      }else {
        foreach ($delDates as $item){
          $delDatesStr .= substr($item->date,0,10)." , ";
        };
        $delDatesStr = substr_replace($delDatesStr, "", -2,2);
      }
      

      

      $_SESSION['rows'] = array("InspectDates" => $insDatesStr, "DeliverDates" => $delDatesStr, "unconfirmed"=>$unconfirmed, "inspectionFlag"=>$inspFlag, "statusName"=>$this->getProjectStatusName($row->status));


      $data = [
        'title' => 'eZolar Assigned Project Details',
      ];
      $this->view('Engineer/project-details', $data);

      }

    public function acceptInspection($projectID,$scheduleID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $project = $this->engineerProjectModel->getAssignedProjectDetails($eng_Id,$projectID);
      
      $this->engineerProjectModel->confirmSchedule($scheduleID);
      $this->engineerProjectModel->advanceProject($projectID,'C0');
      redirect('EngineerProject/projectDetailsPage'.$projectID);
    }

    public function rejectInspection($scheduleID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $this->engineerProjectModel->declineSchedule($scheduleID);
      //setup reassign
      redirect('EngineerProject');
    }


    public function completeInspection($projectID,$date){
      if(!isLoggedIn()){

        redirect('login');
      }
      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $project = $this->engineerProjectModel->getAssignedProjectDetails($eng_Id,$projectID);
      $scheduleID = $this->engineerProjectModel->getScheduleitem($projectID,$date)->scheduleID;
      $this->engineerProjectModel->completeSchedule($scheduleID);
      if ($project->status == 'C0'){
        $this->engineerProjectModel->advanceProject($projectID,'C1');
      }
      redirect('EngineerProject/projectDetailsPage'.$projectID);
    }

    public function assignPackagePage($projectID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $_SESSION['projID'] = $projectID;
      $_SESSION['rows'] = $this->PackageModel-> getAllPackages();

      $data = [
        'title' => 'eZolar Assign Package',
      ];
      $this->view('Engineer/project-assign-pack', $data);

    }

    public function assignPackage($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $this->engineerProjectModel->removeModifiedPackage($_SESSION['projID']);
      $this->engineerProjectModel->projectAssignPack($_SESSION['projID'],$packID);
      $prjID = $_SESSION['projID'];
      unset($_SESSION['projID']);
      redirect('EngineerProject/projectDetailsPage/'.$prjID);
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
        $packID = $this->engineerProjectModel->getAssignedProjectDetails($projectID)->Package_packageID;
        $packageInfo = $this->PackageModel->getPackageDetails($packID);
        $packageInfo->projectID = $projectID;
        $packageContent = $this->PackageModel->getPackageContent($packID);
        $packageExtra = [];

        $_SESSION['PackMod'] = array('Info' => $packageInfo,'Content' => $packageContent, 'Extras' => $packageExtra);
      }
      $data = [
        'title' => 'eZolar Pacakge details',
      ];
      $this->view('Engineer/project-package-details', $data);
    }

    public function projectModifyPackPage($projectID){
      if(!isLoggedIn()){

        redirect('login');
      }

      $initSession = FALSE;
      if(!array_key_exists('PackMod',$_SESSION)){
        $initSession = TRUE;
      } else if($_SESSION['PackMod']['Info']->projectID != $projectID){
        $initSession = TRUE;
      }

      if($initSession){
        if($this->engineerProjectModel->checkModifiedPackage($projectID)){
          $packageInfo = $this->engineerProjectModel->getModifiedPackageInfo($projectID);
          $packageContent = $this->engineerProjectModel->getModifiedPackageContent($projectID);
          $packageExtra = $this->engineerProjectModel->getModifiedPackageExtras($projectID);

          $_SESSION['PackMod'] = array('Info' => $packageInfo,'Content' => $packageContent, 'Extras' => $packageExtra);
        } else {
          $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
          $packID = $this->engineerProjectModel->getAssignedProjectDetails($projectID)->Package_packageID;
          $packageInfo = $this->PackageModel->getPackageDetails($packID);
          $packageInfo->projectID = $projectID;
          $packageContent = $this->PackageModel->getPackageContent($packID);
          $packageExtra = [];

          $_SESSION['PackMod'] = array('Info' => $packageInfo,'Content' => $packageContent, 'Extras' => $packageExtra);
        }
      }
      

      $_SESSION['rows'] = $this->ProductModel->getAllProducts();

      $data = [
        'title' => 'eZolar Modify Pacakge ',
      ];
      $this->view('Engineer/project-modify-pack', $data);

    }

    public function modifyPackageAddItem($projectID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $productID = $_POST['item-id'];
      $quantity = $_POST['item-quantity'];
      if (array_key_exists('PackMod',$_SESSION))  {
          if ($_SESSION['PackMod']['Info']->projectID == $projectID) { //Multiple if statements instead && because the latter condition can only be checked if the prior is true.
            $itemExists = FALSE;
            for($i=0; $i < count($_SESSION['PackMod']['Content']); $i++){
              if($_SESSION['PackMod']['Content'][$i]->productID == $productID){
                $_SESSION['PackMod']['Content'][$i]->productQuantity = $quantity;
                $itemExists = TRUE;
                break;
              }
            }
            if (!$itemExists){
              $item = $this->ProductModel->getProductDetails($productID);
              $item->productQuantity = $quantity;
              $_SESSION['PackMod']['Content'][] = $item;
            }
        }
      }

      redirect('EngineerProject/projectModifyPackPage/'.$projectID);
    }

    public function modifyPackageRemoveItem($productID){
      if(!isLoggedIn()){

        redirect('login');
      }
      if (array_key_exists('PackMod',$_SESSION)){
        for($i=0;$i<count($_SESSION['PackMod']['Content']); $i++){
          if($_SESSION['PackMod']['Content'][$i]->productID == $productID){
            $_SESSION['PackMod']['DelContent'][] = $_SESSION['PackMod']['Content'][$i];
            unset($_SESSION['PackMod']['Content'][$i]);
            break;
          }
        }
        redirect('EngineerProject/projectModifyPackPage/'.$_SESSION['PackMod']['Info']->projectID);
      } else {
        redirect('user/dashboard');
      }
    }

    public function modifyPackageAddExtra($projectID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $description = $_POST['extra-desc'];
      $price = $_POST['extra-price'];
      if (array_key_exists('PackMod',$_SESSION))  {
          if ($_SESSION['PackMod']['Info']->projectID == $projectID) { //Multiple if statements instead && because the latter condition can only be checked if the prior is true.
            $itemExists = FALSE;
            for($i=0; $i < count($_SESSION['PackMod']['Extras']); $i++){
              if($_SESSION['PackMod']['Extras'][$i]->description == $description){
                $_SESSION['PackMod']['Extras'][$i]->price = $price;
                $itemExists = TRUE;
                break;
              }
            }
            if (!$itemExists){
              $item = new stdClass();
              $item->projectID = $projectID;
              $item->description = $description;
              $item->price = $price;
              $_SESSION['PackMod']['Extras'][] = $item;
            }
        }
      }

      redirect('EngineerProject/projectModifyPackPage/'.$projectID);
    }

    public function modifyPackageRemoveExtra($i){
      if(!isLoggedIn()){

        redirect('login');
      }
      if (array_key_exists('PackMod',$_SESSION)){
        $_SESSION['PackMod']['DelExtras'][] = $_SESSION['PackMod']['Extras'][$i];
        array_splice($_SESSION['PackMod']['Extras'],$i,1);
        redirect('EngineerProject/projectModifyPackPage/'.$_SESSION['PackMod']['Info']->projectID);
      } else {
        redirect('user/dashboard');
      }
    }
    

    public function saveModifiedPack(){
      if(!isLoggedIn()){

        redirect('login');
      }
      if($this->engineerProjectModel->checkModifiedPackage($_SESSION['PackMod']['Info']->projectID)){
        $data = array($_SESSION['PackMod']['Info']->projectID,$_SESSION['PackMod']['Info']->packageID);
        $this->engineerProjectModel->updateModifiedPackage($data);
        
        foreach($_SESSION['PackMod']['Content'] as $item){
          $data = array($_SESSION['PackMod']['Info']->projectID,$item->productID,$item->productQuantity);
          if ($this->engineerProjectModel->PackModCheckContent($_SESSION['PackMod']['Info']->projectID,$item->productID)){
            $this->engineerProjectModel->PackModUpdateContent($data);
          }else {
            $this->engineerProjectModel->PackModAddContent($data);
          }
        }
        if (array_key_exists('DelContent',$_SESSION['PackMod'])){
          foreach($_SESSION['PackMod']['DelContent'] as $delItem){
            $data = array($_SESSION['PackMod']['Info']->projectID,$delItem->productID);
            if ($this->engineerProjectModel->PackModCheckContent($_SESSION['PackMod']['Info']->projectID,$delItem->productID)){
              $this->engineerProjectModel->PackModRemoveContent($data);
            }
          }
        }
        foreach($_SESSION['PackMod']['Extras'] as $extra){
          $data = array($_SESSION['PackMod']['Info']->projectID,$extra->description,$extra->price);
          if ($this->engineerProjectModel->PackModCheckExtra($_SESSION['PackMod']['Info']->projectID,$extra->description)){
            $this->engineerProjectModel->PackModUpdateExtra($data);
          }else {
            $this->engineerProjectModel->PackModAddExtra($data);
          }
        }
        if (array_key_exists('DelExtras',$_SESSION['PackMod'])){
          foreach($_SESSION['PackMod']['DelExtras'] as $delExtra){
            $data = array($_SESSION['PackMod']['Info']->projectID,$delExtra->description);
            if ($this->engineerProjectModel->PackModCheckExtra($_SESSION['PackMod']['Info']->projectID,$delExtra->description)){ 
              $this->engineerProjectModel->PackModRemoveExtra($data);
            }
          }
        }

      } else {
        $data = array($_SESSION['PackMod']['Info']->projectID,$_SESSION['PackMod']['Info']->packageID);
        $this->engineerProjectModel->createModifiedPackage($data);
        foreach($_SESSION['PackMod']['Content'] as $item){
          $data = array($_SESSION['PackMod']['Info']->projectID,$item->productID,$item->productQuantity);
          $this->engineerProjectModel->PackModAddContent($data);
        }

        foreach($_SESSION['PackMod']['Extras'] as $extra){
          $data = array($_SESSION['PackMod']['Info']->projectID,$extra->description,$extra->price);
          $this->engineerProjectModel->PackModAddExtra($data);
        }
      }
      $projectID = $_SESSION['PackMod']['Info']->projectID;
      unset($_SESSION['PackMod']);
      redirect('EngineerProject/projectDetailsPage/'.$projectID);

    }

    public function resetCurrentModifiedPack($projectID){
      unset($_SESSION['PackMod']);
      redirect('EngineerProject/projectModifyPackPage/'.$projectID);
    }


    public function confirmPackage($projectID){
      if(!isLoggedIn()){

        redirect('login');
      }
      if($this->engineerProjectModel->checkModifiedPackage($projectID)){
        $this->engineerProjectModel->advanceProject($projectID,'C1');
        redirect('EngineerProject/projectDetailsPage/'.$projectID);
      }

    }
  }