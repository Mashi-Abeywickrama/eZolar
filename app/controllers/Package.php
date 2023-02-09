<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'\app\helpers\session_helper.php');
  if (!array_key_exists('flagUpdate',$_SESSION)){
    $_SESSION['flagUpdate']=0;};

  class Package extends Controller {
    public function __construct(){ 
        $this->PackageModel = $this->model('PackageModel');
    }
    
    public function index(){
      if(!isLoggedIn()){
        redirect('login');
      }
      $rows  = $this->PackageModel-> getAllPackages();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Packages',
      ];
      $this->view('Storekeeper/packages', $data);
    }
    public function newPackagePage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar NewPackage',
      ];
      $this->view('Storekeeper/add-package', $data);

    }
    public function newPackage(){
      if(!isLoggedIn()){

        redirect('login');
      }
        $packId = $_POST['pack-id'];
        $name = $_POST['pack-name'];
        $budget = $_POST['price-range-lower'].' - '.$_POST['price-range-upper'];
        $type = $_POST['pack-type'];
        
        
        $inputs = array($packId,$name,$type,$budget);
        $this->PackageModel->addPackage($inputs);
        redirect('Package/editPackageContentPage/'.$packId);

    }

    public function packageDetailspage($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $row = $this->PackageModel->getPackageDetails($packID);
      $_SESSION['row'] = $row;

      $rows = $this->PackageModel->getPackageContent($packID);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Pacakge details',
      ];
        $this->view('Storekeeper/package-details',$data);


    }

    public function editPackageInfoPage($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $row = $this->PackageModel->getPackageDetails($packID);
      $_SESSION['row'] = $row;

      $data = [
        'title' => 'eZolar Edit Pacakge details',
      ];
      $this->view('Storekeeper/edit-package',$data);
    }

    public function editPackageInfo($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $name = $_POST['pack-name'];
      $budget = $_POST['price-range-lower'].' - '.$_POST['price-range-upper'];
      $type = $_POST['pack-type'];
      $inputs = array($packId,$name,$type,$budget);
      $this->PackageModel->editPackage($inputs);
      $_SESSION['flagUpdate'] = 1;
      redirect('Package/packageDetailspage/'.$packID);
    }

    public function editPackageContentPage($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $row = $this->PackageModel->getPackageDetails($packID);
      $_SESSION['row'] = $row;
      $rows = $this->PackageModel->getPackageContent($packID);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Edit Pacakge content',
      ];
      $this->view('Storekeeper/edit-package-content',$data);
    }

    public function packageAddItem($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
        $productID = $_POST['item-id'];
        $quantity = $_POST['item-quantity'];
        $inputs = array($packID,$productID,$quantity);

      if (!$this->PackageModel->checkitem($packID,$productID)){
        $this->PackageModel->additem($inputs);
      };

      redirect('Package/editPackageContentPage/'.$packID);
    }

  }