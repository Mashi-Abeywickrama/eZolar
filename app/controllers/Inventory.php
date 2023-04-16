<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'\app\helpers\session_helper.php');
  if (!array_key_exists('flagUpdate',$_SESSION)){
  $_SESSION['flagUpdate']=0;};

  class Inventory extends Controller {
    public function __construct(){ 
        $this->InventoryModel = $this->model('InventoryModel');
        $this->ProductModel = $this->model('ProductModel');
        $this -> UserModel = $this->model('UserModel');

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

    public function addStocksPage(){
      if(!isLoggedIn()){
        redirect('login');
      }

      $stocks = $this->InventoryModel->getStockIDs();
      $sID = 1;
      if (!array_key_exists('stockID',$_SESSION)){
        if (count($stocks)>0){
          for ($x=0;$x<count($stocks);$x++){
            if ($sID == (int)$stocks[$x]->stockID){
                $sID++;
            }
            $sID = max($sID,(int)$stocks[$x]->stockID);
          }
        }
        $sID = str_pad((string)$sID, 6, '0', STR_PAD_LEFT);
        $_SESSION['stockID'] = $sID;
      }
      
      if (!array_key_exists('stockContent',$_SESSION)){
        $_SESSION['stockContent'] = [];
      }

      if (!array_key_exists('stockDetails',$_SESSION)){
        $_SESSION['stockDetails'] = ['',''];
      }

      $products = $this->ProductModel-> getAllProducts();
      $_SESSION['rowss'] = $products;

      $data = [
        'title' => 'eZolar Add Stock',
      ];

      $this->view('Storekeeper/add-stock', $data);

    }

    public function addStocksItem(){
      if(!isLoggedIn()){
        redirect('login');
      }
      $repeatFlag = FALSE;
      $productID = $_POST['item-id'];
      $quantity = $_POST['item-quantity'];

      $_SESSION['stockDetails'][0] = $_POST['arrival-date'];
      $_SESSION['stockDetails'][1] = $_POST['stock-type'];

      foreach ($_SESSION['stockContent'] as $stockContent){
        if ($stockContent[0]->productID == $productID){
          $repeatFlag = TRUE;
          break;
        }
      }

      if (!$repeatFlag){
        $product = $this->ProductModel->getProductDetails($productID);
        $_SESSION['stockContent'][] = [$product,$quantity];
      }

      redirect('Inventory/addStocksPage');
    }

    public function removeStockItem($index){
      if(!isLoggedIn()){
        redirect('login');
      }
      unset($_SESSION['stockContent'][$index]);
      redirect('Inventory/addStocksPage');
    }

    public function addStock(){
      if(!isLoggedIn()){
        redirect('login');
      }

      $skID = $this->UserModel->getUserID($_SESSION['user_email']);

      if (array_key_exists('stockID',$_SESSION) && array_key_exists('stockContent',$_SESSION) && array_key_exists('stockDetails',$_SESSION)){
        $stockInfo = [$_SESSION['stockID'],$_POST['arrival-date'],$_POST['stock-type'], $skID];
        $this->InventoryModel->addStock($stockInfo);

        if ($stockInfo[2]=="Arrival"){
          $type = "add";
        } else if ($stockInfo[2]=="Withdrawal"){
          $type = "rem";
        } else {
          return;
        }

        foreach($_SESSION['stockContent'] as $item){
          $this->InventoryModel->addStockContent($stockInfo,$item);
          $this->InventoryModel->updateInventory($item[0] -> productID,$item[1],$type);
        }



        unset($_SESSION['stockID'], $_SESSION['stockContent'], $_SESSION['stockDetails']);

        redirect('Inventory/viewStocks');
      }
    }

    public function clearStockContent(){
      unset($_SESSION['stockID'], $_SESSION['stockContent'], $_SESSION['stockDetails']);
      redirect('Inventory/addStocksPage');
    }

    }