<?php
  class InventoryModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getInventory(){
      
      $this->db->query('SELECT * FROM product');
      $row = $this->db->resultSet([]);
      return $row;
    }

    public function getStocks(){
      
      $this->db->query('SELECT * FROM stock');
      $row = $this->db->resultSet([]);
      return $row;
    }

  }