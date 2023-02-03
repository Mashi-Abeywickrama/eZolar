<?php
  class ProductModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addProduct($data){
      
      $this->db->query('INSERT INTO product(`productID`,`productName`, `cost`,`manufacturer`,`quantity`) VALUES (:productID,:productName,:cost,:manufacturer,:quantity)');
      $this->db->execute(['productID' => $data[0], 'productName' => $data[1], 'cost' => $data[2], 'manufacturer' => $data[3], 'quantity' => $data[4]]);

    }

    public function getAllProducts(){
      
      $this->db->query('SELECT * FROM product');
      $row = $this->db->resultSet([]);
      return $row;


    }

  }