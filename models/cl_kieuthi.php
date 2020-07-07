<?php
class cl_kieuthi{

  private $conn;
  private $table = 'tb_kieuthi';

  //Posrt Properties
  public $kieuthi_id;
  public $kieuthi_ten;
  public $kieuthi_hinhthuc;
  public $kieuthi_mota;

  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM ' . $this->table . '';


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
      kieuthi_ten = :kieuthi_ten,
      kieuthi_hinhthuc = :kieuthi_hinhthuc,
      kieuthi_mota = :kieuthi_mota';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->kieuthi_ten = htmlspecialchars(strip_tags($this->kieuthi_ten));
    $this->kieuthi_hinhthuc = htmlspecialchars(strip_tags($this->kieuthi_hinhthuc));
    $this->kieuthi_mota = htmlspecialchars(strip_tags($this->kieuthi_mota));

    //Bind data
    $stmt->bindParam(':kieuthi_ten',$this->kieuthi_ten);
    $stmt->bindParam(':kieuthi_hinhthuc',$this->kieuthi_hinhthuc);
    $stmt->bindParam(':kieuthi_mota',$this->kieuthi_mota);

    //Execute query
    if ($stmt->execute()) {
      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }

  //UPDATE POST
  public function update(){
    //CREATE query
    $query = 'UPDATE '. $this->table . '
    SET
    kieuthi_ten = :kieuthi_ten,
    kieuthi_hinhthuc = :kieuthi_hinhthuc,
    kieuthi_mota = :kieuthi_mota
    WHERE
      kieuthi_ma = :kieuthi_id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->kieuthi_ten = htmlspecialchars(strip_tags($this->kieuthi_ten));
    $this->kieuthi_hinhthuc = htmlspecialchars(strip_tags($this->kieuthi_hinhthuc));
    $this->kieuthi_mota = htmlspecialchars(strip_tags($this->kieuthi_mota));

    //Bind data
    $stmt->bindParam(':kieuthi_ten',$this->kieuthi_ten);
    $stmt->bindParam(':kieuthi_hinhthuc',$this->kieuthi_hinhthuc);
    $stmt->bindParam(':kieuthi_mota',$this->kieuthi_mota);

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
    $query = 'DELETE FROM ' . $this->table . ' WHERE kieuthi_id = :kieuthi_id ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->kieuthi_id = htmlspecialchars(strip_tags($this->kieuthi_id));

    //Bind data
    $stmt->bindParam(':kieuthi_id',$this->kieuthi_id);

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
