<?php
  class ProductModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getUserRole($email){
      $this->db->query('SELECT type FROM user where email = :email');
      $row = $this->db->single(['email' => $email]);
      return ($row->type);
    }
    public function addProduct($data){
      
      $this->db->query('INSERT INTO product(`productID`,`productName`, `cost`,`manufacturer`,`quantity`) VALUES (:productID,:productName,:cost,:manufacturer,:quantity)');
      $this->db->execute(['productID' => $data[0], 'productName' => $data[1], 'cost' => $data[2], 'manufacturer' => $data[3], 'quantity' => $data[4]]);

    }

    public function getAllProducts(){
      
      $this->db->query('SELECT * FROM product WHERE isDeleted=0');
      $row = $this->db->resultSet([]);
      return $row;


    }

    public function getProductDetails($productID){
      $this->db->query('SELECT * FROM product WHERE productID = :productID');
      $row = $this->db->single(['productID' => $productID]);
      return $row;
    }

    public function editProduct($data){
      $this->db->query('UPDATE product SET `productName` = :productName, `cost` = :cost, `manufacturer` = :manufacturer WHERE `productID` = :productID'); 
      $this->db->execute(['productID' => $data[0], 'productName' => $data[1], 'cost' => $data[2], 'manufacturer' => $data[3]]);
    }

    public function getAllProductIDs(){
      $this->db->query('SELECT productID FROM product');
      $rows = $this->db->resultSet([]);
      return $rows;
    }

    public function deleteProduct($productID){
      $this->db->query('UPDATE product SET isDeleted = 1 WHERE productID = :productID'); 
      $this->db->execute(['productID' => $productID]);
    }


  }