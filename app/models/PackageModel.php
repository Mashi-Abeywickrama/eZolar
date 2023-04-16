<?php
  class PackageModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    public function getUserRole($email){
      $this->db->query('SELECT type FROM user where email = :email');
      $row = $this->db->single(['email' => $email]);
      return ($row->type);
    }
    public function addPackage($data){
      
      $this->db->query('INSERT INTO package(`packageID`,`name`, `type`,`budgetRange`) VALUES (:packID,:name_,:type_,:budget)'); 
      $this->db->execute(['packID' => $data[0], 'name_' => $data[1], 'type_' => $data[2], 'budget' => $data[3]]);
    }

    public function getAllPackages(){
      
      $this->db->query('SELECT * FROM package WHERE isDeleted=0');
      $row = $this->db->resultSet([]);
      return $row;


    }

    public function getPackageDetails($packID){
      $this->db->query('SELECT * FROM package WHERE packageID = :packageID');
      $row = $this->db->single(['packageID' => $packID]);
      return $row;
    }

    public function  getPackageContent($packID){

      //function to retun products listed under a certain package
      $this->db->query('SELECT * FROM package_product INNER JOIN product ON package_product.Product_productID = product.productID WHERE Package_packageID = :packID');
      $rows  = $this->db->resultSet(['packID' => $packID]);
      return $rows;
    }

    public function editPackage($data){
      $this->db->query('UPDATE package SET `packageName` = :packName, `type` = :type_, `budgetRange` = :budget WHERE `packageID` = :packID'); 
      $this->db->execute(['packID' => $data[0], 'packName' => $data[1], 'type_' => $data[2], 'budget' => $data[3]]);
    }

    public function additem($data){
      $this->db->query('INSERT INTO package_product(`Package_packageID`,`Product_productID`, `productQuantity`) VALUES (:packID,:productID,:quantity)'); 
      $this->db->execute(['packID' => $data[0], 'productID' => $data[1], 'quantity' => $data[2]]);
    }

    public function removeitem($data){
      $this->db->query('DELETE FROM package_product WHERE Package_packageID = :packID AND Product_productID = :productID'); 
      $this->db->execute(['packID' => $data[0], 'productID' => $data[1]]);
    }

    public function checkitem($packID,$productID){
      $this->db->query('SELECT COUNT(*) as count FROM `package_product` WHERE `Package_packageID` = :packID AND `Product_productID` = :productID;');
      $result = $this->db->single(['packID' => $packID, 'productID' => $productID]);
      $count = $result->count;
      if ($count>0){
        return TRUE;
      } else{
        return FALSE;
      };
    }

    public function updateitem($data){
      $this->db->query('UPDATE package_product SET `productQuantity` = :quantity WHERE `Package_packageID` = :packID AND `Product_productID` = :productID;'); 
      $this->db->execute(['packID' => $data[0], 'productID' => $data[1], 'quantity' => $data[2]]);
    }

    public function getAllPackageIDs(){
      $this->db->query('SELECT packageID FROM package');
      $rows = $this->db->resultSet([]);
      return $rows;
    }

    public function deletePackage($packID){
      $this->db->query('UPDATE package SET isDeleted = 1 WHERE packageID = :packID'); 
      $this->db->execute(['packID' => $packID]);
    }


  }