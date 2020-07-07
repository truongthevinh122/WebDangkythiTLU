<?php
class cl_monhoc{

  private $conn;
  private $table = 'tb_monhoc';

  //Posrt Properties
  public $monhoc_id;
  public $bomon_ma;
  public $monhoc_ma;
  public $monhoc_ten;
  public $bomon_ten;

  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM ' . $this->table .'
            LEFT JOIN
              tb_bomon ON tb_monhoc.bomon_ma = tb_bomon.bomon_ma
            ORDER BY monhoc_ma
              ';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }

  public function create(){
    //CREATE query
    $query = 'INSERT INTO tb_monhoc
    (monhoc_ma, monhoc_ten, bomon_ma)
    VALUES (:monhoc_ma, :monhoc_ten, :bomon_ma)';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->monhoc_ma = htmlspecialchars(strip_tags($this->monhoc_ma));
    $this->monhoc_ten = htmlspecialchars(strip_tags($this->monhoc_ten));
    $this->bomon_ma = htmlspecialchars(strip_tags($this->bomon_ma));

    //Bind data
    $stmt->bindParam(':monhoc_ma',$this->monhoc_ma);
    $stmt->bindParam(':monhoc_ten',$this->monhoc_ten);
    $stmt->bindParam(':bomon_ma',$this->bomon_ma);


    //Execute query
    if ($stmt->execute()) {
      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }

  public function delete(){
    //CREATE query
    $query = 'DELETE FROM ' . $this->table . ' WHERE monhoc_ma = :monhoc_ma ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->monhoc_ma = htmlspecialchars(strip_tags($this->monhoc_ma));

    //Bind data
    $stmt->bindParam(':monhoc_ma',$this->monhoc_ma);

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
