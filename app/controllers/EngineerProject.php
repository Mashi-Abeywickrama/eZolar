<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class EngineerProject extends Controller {
    
    public function __construct(){ 
        $this->engineerProjectModel = $this->model('EngineerProjectModel');
        $this->PackageModel = $this->model('PackageModel');
        $this->ProductModel = $this->model('ProductModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $eng_Id = $this->engineerProjectModel->getUserID([$_SESSION['user_email']]);
      $rows  = $this->engineerProjectModel-> getAssignedProjects($eng_Id);
      $_SESSION['rows'] = $rows;
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
      $row = $this->engineerProjectModel->getAssignedProjectDetails($eng_Id,$prjID);
      if ($row->Salesperson_Employee_empID == ''){
        $row->Salesperson_Employee_empID = 'Not Assigned';
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
      if (count($insDates)<1){
        $insDatesStr = "Not Scheduled";
      };
      if (count($delDates)<1){
        $delDatesStr = "Not Scheduled";
      };

      foreach ($insDates as $item){
        $insDatesStr .= substr($item->date,0,10)." , ";
      };
      $insDatesStr = substr_replace($insDatesStr, "", -2,2);

      foreach ($delDates as $item){
        $delDatesStr .= substr($item->date,0,10)." , ";
      };
      $delDatesStr = substr_replace($delDatesStr, "", -2,2);

      $_SESSION['rows'] = array("InspectDates" => $insDatesStr, "DeliverDates" => $delDatesStr);


      $data = [
        'title' => 'eZolar Assigned Project Details',
      ];
      $this->view('Engineer/project-details', $data);

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
          $packID = $this->engineerProjectModel->getAssignedProjectDetails($eng_Id,$projectID)->Package_packageID;
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
                $_SESSION['PackMod']['Extras'][$i]->price = $quantity;
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
  }