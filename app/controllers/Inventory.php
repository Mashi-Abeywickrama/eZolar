<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP   ;
  require '../vendor/autoload.php';
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
        $this->checkreorderlevels();

        unset($_SESSION['stockID'], $_SESSION['stockContent'], $_SESSION['stockDetails']);

        redirect('Inventory/viewStocks');
      }
    }

    public function clearStockContent(){
      unset($_SESSION['stockID'], $_SESSION['stockContent'], $_SESSION['stockDetails']);
      redirect('Inventory/addStocksPage');
    }

    public function checkreorderlevels(){
      $productList = $this->ProductModel->getAllProducts();
      $alert = FALSE;
      $restockList = [];
      foreach($productList as $product){
        if (($product->quantity <= (int)$product->reorderLimit) && ($product->reorderFlag == 0)){
          $alert = TRUE;
          $restockList[] = array($product->productName,$product->manufacturer,$product->quantity,$product->reorderLimit);
          $this->InventoryModel->raiseReorderFlag($product->productID);       
        } else if (($product->quantity > (int)$product->reorderLimit) && ($product->reorderFlag == 1)){
          $this->InventoryModel->lowerReorderFlag($product->productID);
        }
      }
      if ($alert){
        $this->mailStorekeeper($restockList);
      }
    }

    private function mailStorekeeper($restockList){
      $skEmails = $this->InventoryModel->getSKemails();
      //Create an instance; passing `true` enables exceptions
      $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

      $mail->IsSMTP();  // telling the class to use SMTP
      // $mail->SMTPDebug = 2;
      $mail->Mailer = "smtp";
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->Username = 'team.ezolar@gmail.com';
      $mail->Password = 'blgrajvyohisnita';
      //From email address and name
      $mail->From = "ezolar.team@gmail.com";
      $mail->FromName = "Ezolar";

      //To address and name
      foreach ($skEmails as $sk){
        $mail->addAddress($sk->email); //Recipient name is optional                                                                                         
      }
      //Address to which recipient will reply
      $mail->addReplyTo("noreply@ezolar.com", "Ezolar");

      $restockStr = "<table><tr><th>Product Name</th><th>Manufacturer</th><th>Current Quantity</th><th>Reorder Level</th></tr>";

      foreach($restockList as $item){
        $restockStr .= '<tr><td>'.$item[0].'</td><td>'.$item[1].'</td><td>'.$item[2].'</td><td>'.$item[3].'</td></tr>';
      }
      
      $restockStr .= "</table>";

      //Send HTML or Plain Text email
      $mail->isHTML(true);

      $mail->Subject = "Inventory Stocks needs attention.";
      $mail->Body = "<p>Th Following Items are below the set reorder levels for them. </p>".$restockStr;
      $mail->AltBody = "This is the plain text version of the email content";


      try {
          $mail->send();
          header('Location:/ezolar/login/enterOTP');
      } catch (Exception $e) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      }
    }

    }