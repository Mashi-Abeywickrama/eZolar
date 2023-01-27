<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  require_once(__ROOT__.'\app\helpers\session_helper.php');

  class Product extends Controller {
    public function __construct(){ 
        $this->ProductModel = $this->model('ProductModel');
    }
    
    public function index(){
      if(!isLoggedIn()){
        redirect('login');
      }
      $rows  = $this->ProductModel-> getAllProducts();
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Products',
      ];
      $this->view('Storekeeper/products', $data);
    }
    public function newProductPage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar NewProduct',
      ];
      $this->view('Storekeeper/add-products', $data);

    }
    public function newProduct(){
      if(!isLoggedIn()){

        redirect('login');
      }
        $product_Id = $_POST['product-id'];
        $name = $_POST['product-name'];
        $cost = $_POST['price'];
        $manufacturer = $_POST['manufacturer'];
        $quantity = 0;
        
        
        $inputs = array($product_Id,$name,$cost,$manufacturer,$quantity);
        $this->ProductModel->addProduct($inputs);
        redirect('Product/');

    }

  }