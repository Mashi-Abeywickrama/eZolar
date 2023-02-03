<?php
  class ProductModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function addProduct($data){
      // $userid  =($this->db->single());
      
      $this->db->query('INSERT INTO product(`productID`,`productName`, `cost`,`manufacturer`,`quantity`) VALUES (:productID,:productName,:cost,:manufacturer,:quantity)');
      // $this->db->bind(':productID', $data[0]);
      // $this->db->bind(':productName', $data[1]);
      // $this->db->bind(':cost', $data[2]);
      // $this->db->bind(':manufacturer', $data[3]);
      // $this->db->bind(':quantity', $data[4]);
      //print_r($data);die;  
      $this->db->execute(['productID' => $data[0], 'productName' => $data[1], 'cost' => $data[2], 'manufacturer' => $data[3]. 'quantity' => $data[4]]);
    }

    public function getAllProducts(){
      
      $this->db->query('SELECT * FROM product');
      $row = $this->db->resultSet();
      return $row;


    }

  }