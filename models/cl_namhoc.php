<?php
class cl_namhoc{

  private $conn;
  private $table = 'tb_namhoc';

  //Posrt Properties
  public $namhoc_id;
  public $namhoc_ten;

  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM ' . $this->table .'
            ORDER BY namhoc_ten DESC';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }


  public function create(){
    //CREATE query
    $query = 'INSERT INTO tb_namhoc
    (namhoc_ten)
    VALUES (:namhoc_ten)';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->namhoc_ten = htmlspecialchars(strip_tags($this->namhoc_ten));

    //Bind data
    $stmt->bindParam(':namhoc_ten',$this->namhoc_ten);


    //Execute query
    if ($stmt->execute()) {
      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }

  //DELETE Post
  public function delete(){
    //CREATE query
    $query = 'DELETE FROM ' . $this->table . ' WHERE namhoc_ten = :namhoc_ten ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->namhoc_ten = htmlspecialchars(strip_tags($this->namhoc_ten));

    //Bind data
    $stmt->bindParam(':namhoc_ten',$this->namhoc_ten);

    //Execute query
    if ($stmt->execute()) {
      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }

}

 ?>
