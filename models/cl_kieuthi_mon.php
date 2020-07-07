<?php
class cl_kieuthi_monhoc{

  private $conn;
  private $table = 'tb_kieuthi_monhoc';

  //Posrt Properties
  public $ktmh_id;
  public $kieuthi_ten;
  public $kieuthi_mota;
  public $monhoc_ma;
  public $monhoc_ten;
  public $namhoc_ten;

  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT tb_monhoc.monhoc_ten as monhoc_ten,
              tb_kieuthi.kieuthi_mota as kieuthi_mota,
              tb_kieuthi_monhoc.ktmh_id,
              tb_kieuthi_monhoc.kieuthi_ten,
              tb_kieuthi_monhoc.monhoc_ma,
              tb_kieuthi_monhoc.namhoc_ten
            FROM tb_kieuthi_monhoc
            LEFT JOIN
              tb_monhoc ON tb_kieuthi_monhoc.monhoc_ma = tb_monhoc.monhoc_ma
            LEFT JOIN
              tb_kieuthi ON tb_kieuthi_monhoc.kieuthi_ten = tb_kieuthi.kieuthi_ten
            ORDER BY tb_kieuthi_monhoc.monhoc_ma';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }

  //CREATE POST
  public function create(){
    //CREATE query
    $query = 'INSERT INTO tb_kieuthi_monhoc
    (monhoc_ma, kieuthi_ten, namhoc_ten)
    VALUES (:monhoc_ma, :kieuthi_ten, :namhoc_ten)';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->monhoc_ma = htmlspecialchars(strip_tags($this->monhoc_ma));
    $this->monhoc_ten = htmlspecialchars(strip_tags($this->kieuthi_ten));
    $this->bomon_ma = htmlspecialchars(strip_tags($this->namhoc_ten));

    //Bind data
    $stmt->bindParam(':monhoc_ma',$this->monhoc_ma);
    $stmt->bindParam(':kieuthi_ten',$this->kieuthi_ten);
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
    $query = 'DELETE FROM ' . $this->table . ' WHERE ktmh_id = :ktmh_id ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->ktmh_id = htmlspecialchars(strip_tags($this->ktmh_id));

    //Bind data
    $stmt->bindParam(':ktmh_id',$this->ktmh_id);

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
    $query = 'UPDATE tb_kieuthi_monhoc
    SET
      kieuthi_ten = :kieuthi_ten
    WHERE
      ktmh_id = :ktmh_id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->kieuthi_ten = htmlspecialchars(strip_tags($this->kieuthi_ten));
    $this->ktmh_id = htmlspecialchars(strip_tags($this->ktmh_id));

    //Bind data
    $stmt->bindParam(':kieuthi_ten',$this->kieuthi_ten);
    $stmt->bindParam(':ktmh_id',$this->ktmh_id);

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
