<?php
class cl_kyhoc{

  private $conn;
  private $table = 'tb_kyhoc';

  //Posrt Properties
  public $kyhoc_id;
  public $kyhoc_ten;
  public $namhoc_ten;
  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM ' . $this->table .'
            ORDER BY namhoc_ten ASC';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }


  //CREATE POST
  public function create(){
    //CREATE query
    $query = 'INSERT INTO '. $this->table . '
    SET
      kyhoc_ten = :kyhoc_ten,
      namhoc_ten = :namhoc_ten';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->kyhoc_ten = htmlspecialchars(strip_tags($this->kyhoc_ten));
    $this->namhoc_ten = htmlspecialchars(strip_tags($this->namhoc_ten));

    //Bind data
    $stmt->bindParam(':kyhoc_ten',$this->kyhoc_ten);
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
    $query = 'DELETE FROM ' . $this->table . ' WHERE kyhoc_id = :kyhoc_id ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->kyhoc_id = htmlspecialchars(strip_tags($this->kyhoc_id));

    //Bind data
    $stmt->bindParam(':kyhoc_id',$this->kyhoc_id);

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
