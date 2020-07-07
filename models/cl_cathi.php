<?php
class cl_cathi{

  private $conn;
  private $table = 'tb_cathi';

  //Posrt Properties
  public $cathi_id;
  public $cathi_ten;
  public $batdau;
  public $ketthuc;


  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM ' . $this->table .'
            ORDER BY cathi_id';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }


  public function create(){
    //CREATE query
    $query = 'INSERT INTO tb_cathi
    (cathi_ten,batdau,ketthuc)
    VALUES (:cathi_ten,:batdau,:ketthuc)';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->cathi_ten = htmlspecialchars(strip_tags($this->cathi_ten));
    $this->batdau = htmlspecialchars(strip_tags($this->batdau));
    $this->ketthuc = htmlspecialchars(strip_tags($this->ketthuc));

    //Bind data
    $stmt->bindParam(':cathi_ten',$this->cathi_ten);
    $stmt->bindParam(':batdau',$this->batdau);
    $stmt->bindParam(':ketthuc',$this->ketthuc);


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
    $query = 'DELETE FROM ' . $this->table . ' WHERE cathi_id = :cathi_id ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->cathi_id = htmlspecialchars(strip_tags($this->cathi_id));

    //Bind data
    $stmt->bindParam(':cathi_id',$this->cathi_id);

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
