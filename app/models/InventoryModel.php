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

    public function getStockIDs(){
      $this->db->query('SELECT stockID FROM stock');
      $row = $this->db->resultSet([]);
      return $row;
    }

    public function getStockDetails($sID){
      $this->db->query('SELECT * FROM stock_product WHERE Stock_stockID	 = :stockID');
      $row = $this->db->resultSet(['stockID' => $sID]);
      return $row;
    }

    public function getStockContent($sID){
      $this->db->query('SELECT * FROM stock_product INNER JOIN product ON stock_product.Product_productID = product.productID WHERE Stock_stockID	 = :stockID');
      $row = $this->db->resultSet(['stockID' => $sID]);
      return $row;
    }

    public function addStock($stockInfo, $stockContent){
      $this->db->query('INSERT INTO stock(`stockID`,`arrivalDate`, `Storekeeper_Employee_empID`,`stockType`) VALUES (:stockID,:arrivalDate,:Storekeeper_Employee_empID,:stockType)');
      $this->db->execute(['stockID' => $stockInfo[0], 'arrivalDate' => $stockInfo[1], 'stockType' => $stockInfo[2], 'Storekeeper_Employee_empID' => $stockInfo[3]]);

      foreach($stockContent as $item){
        $this->db->query('INSERT INTO stock_product(`Stock_stockID`,`Product_productID`, `quantity`) VALUES (:stockID,:productID,:quantity)');
        $this->db->execute(['stockID' => $stockInfo[0], 'productID' => $item[0] -> productID, 'quantity' => $item[1]]);
      }
    }
  }