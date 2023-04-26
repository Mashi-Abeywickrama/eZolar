<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'/app/helpers/session_helper.php');
  if (!array_key_exists('flagUpdate',$_SESSION)){
    $_SESSION['flagUpdate']=0;};

  class Package extends Controller {
    public function __construct(){ 
        $this->PackageModel = $this->model('PackageModel');
        $this->ProductModel = $this->model('ProductModel');
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

      if ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/packages', $data);
      }
      elseif ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/packages', $data);
      }
      // $this->view('Storekeeper/packages', $data);
    }
    public function newPackagePage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $rows  = $this->PackageModel-> getAllPackageIDs();
      $_SESSION['rows'] = $rows;

      $data = [
        'title' => 'eZolar NewPackage',
      ];

      if ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/add-package', $data);
      }
      elseif ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/add-package', $data);
      }
      // $this->view('Storekeeper/add-package', $data);

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

      if ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/package-details', $data);
      }
      elseif ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/package-details', $data);
      }
        // $this->view('Storekeeper/package-details',$data);


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

      if ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/edit-package', $data);
      }
      elseif ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/edit-package', $data);
      }
      // $this->view('Storekeeper/edit-package',$data);
    }

    public function editPackageInfo($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $name = $_POST['pack-name'];
      $budget = $_POST['price-range-lower'].' - '.$_POST['price-range-upper'];
      $type = $_POST['pack-type'];
      $inputs = array($packID,$name,$type,$budget);
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
      $rowss = $this->ProductModel->getAllProducts();
      $_SESSION['rowss'] = $rowss;
      $data = [
        'title' => 'eZolar Edit Pacakge content',
      ];

      if ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/edit-package-content', $data);
      }
      elseif ($this->PackageModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/edit-package-content', $data);
      }
      // $this->view('Storekeeper/edit-package-content',$data);
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
      }
      else{
        $this->PackageModel->updateitem($inputs);
      };

      redirect('Package/editPackageContentPage/'.$packID);
    }

    public function packageRemoveItem($packID,$productID){
      if(!isLoggedIn()){

        redirect('login');
      }
        
        $inputs = array($packID,$productID);

      if ($this->PackageModel->checkitem($packID,$productID)){
        $this->PackageModel->removeitem($inputs);
      };

      redirect('Package/editPackageContentPage/'.$packID);
    }

    public function removePackage($packID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $this->PackageModel->deletePackage($packID);

      redirect('Package/');
    }


  }