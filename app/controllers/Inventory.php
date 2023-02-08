<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'\app\helpers\session_helper.php');
  if (!array_key_exists('flagUpdate',$_SESSION)){
  $_SESSION['flagUpdate']=0;};

  class Inventory extends Controller {
    public function __construct(){ 
        $this->InventoryModel = $this->model('InventoryModel');
    }
    
    public function index(){
      if(!isLoggedIn()){
        redirect('login');
      }
      $rows  = $this->InventoryModel-> getInventory();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Inventory',
      ];
      $this->view('Storekeeper/inventory', $data);
    }

    public function viewStocks(){
      if(!isLoggedIn()){
        redirect('login');
      }
      $rows  = $this->InventoryModel-> getStocks();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Inventory',
      ];
      $this->view('Storekeeper/view-stocks', $data);
    }

    }