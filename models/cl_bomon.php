<?php
class cl_bomon{

  private $conn;
  private $table = 'tb_bomon';

  //Posrt Properties
  public $bomon_id;
  public $bomon_ma;
  public $bomon_ten;

  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT * FROM '. $this->table . '';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }

  //Get Single Post
  public function read_single(){
    //CREATE Query
    $query = 'SELECT * FROM '. $this->table . ' WHERE bomon_ma = ? ';

    //prepare Statement
    $stmt = $this->conn->prepare($query);

    //Bind ID
    $stmt->bindParam(1,$this->bomon_ma);
    //Execute Query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //Set properties
    $this->bomon_ma = $row['bomon_ma'];
    $this->bomon_ten = $row['bomon_ten'];
  }

  //CREATE POST
  public function create(){
    //CREATE query
    $query = 'INSERT INTO '. $this->table . '
    SET
      bomon_ma = :bomon_ma,
      bomon_ten = :bomon_ten';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->bomon_ma = htmlspecialchars(strip_tags($this->bomon_ma));
    $this->bomon_ten = htmlspecialchars(strip_tags($this->bomon_ten));


    //Bind data
    $stmt->bindParam(':bomon_ma',$this->bomon_ma);
    $stmt->bindParam(':bomon_ten',$this->bomon_ten);

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
    $query = 'DELETE FROM ' . $this->table . ' WHERE bomon_ma = :bomon_ma ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->bomon_ma = htmlspecialchars(strip_tags($this->bomon_ma));

    //Bind data
    $stmt->bindParam(':bomon_ma',$this->bomon_ma);

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
