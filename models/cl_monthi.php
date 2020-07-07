<?php
class cl_monthi{

  private $conn;
  private $table = 'tb_monthi';

  //Posrt Properties
  public $monthi_id;
  public $monhoc_ma;
  public $monhoc_ten;
  public $monthi_mota;
  public $kyhoc_id;
  public $ktmh_id;
  public $kieuthi_ten;
  public $kieuthi_mota;


  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM monthi_kieuthi
              ';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }


  //CREATE POST
  public function create(){
    //CREATE query
    $query = 'INSERT INTO tb_monthi
    (monhoc_ma, monthi_mota, kyhoc_id)
    VALUES (:monhoc_ma, :monthi_mota, :kyhoc_id)';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->monhoc_ma = htmlspecialchars(strip_tags($this->monhoc_ma));
    $this->monthi_mota = htmlspecialchars(strip_tags($this->monthi_mota));
    $this->kyhoc_id = htmlspecialchars(strip_tags($this->kyhoc_id));

    //Bind data
    $stmt->bindParam(':monhoc_ma',$this->monhoc_ma);
    $stmt->bindParam(':monthi_mota',$this->monthi_mota);
    $stmt->bindParam(':kyhoc_id',$this->kyhoc_id);


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
    $query = 'DELETE FROM tb_monthi WHERE monthi_id = :monthi_id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->monthi_id = htmlspecialchars(strip_tags($this->monthi_id));

    //Bind data
    $stmt->bindParam(':monthi_id',$this->monthi_id);

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
