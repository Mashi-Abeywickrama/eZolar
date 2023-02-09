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

      if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/products', $data);
      }
      elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/products', $data);
      }

      
    }
    public function newProductPage(){
      if(!isLoggedIn()){

        redirect('login');
      }
      $data = [
        'title' => 'eZolar NewProduct',
      ];

      if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
        $this->view('Storekeeper/add-products', $data);
      }
      elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
        $this->view('Admin/add-products', $data);
      }
      // $this->view('Storekeeper/add-products', $data);

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

    public function productDetailspage($productID){
      if(!isLoggedIn()){

        redirect('login');
      }
        $row = $this->ProductModel->getProductDetails($productID);
        $_SESSION['row'] = $row;
        $data = [
          'title' => 'eZolar Product details',
        ];

        if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
          $this->view('Storekeeper/product-details', $data);
        }
        elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
          $this->view('Admin/product-details', $data);
        }

        // $this->view('Storekeeper/product-details',$data);

    }

    public function editProduct($productId){
      if(!isLoggedIn()){
        redirect('login');
      }
        $name = $_POST['product-name'];
        $cost = $_POST['price'];
        $manufacturer = $_POST['manufacturer'];
        $quantity = 0;
        
        
        $inputs = array($productId,$name,$cost,$manufacturer);
        $this->ProductModel->editProduct($inputs);
        $_SESSION['flagUpdate'] = 1;
        redirect('Product/productDetailspage/'.$productId);

    }

    public function editProductPage($productID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $row = $this->ProductModel->getProductDetails($productID);
        $_SESSION['row'] = $row;
        $data = [
          'title' => 'eZolar Edit Product details',
        ];

        if ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Storekeeper"){
          $this->view('Storekeeper/edit-products', $data);
        }
        elseif ($this->ProductModel->getUserRole($_SESSION['user_email']) == "Admin"){
          $this->view('Admin/edit-products', $data);
        }
        // $this->view('Storekeeper/edit-products',$data);
    }

    }
