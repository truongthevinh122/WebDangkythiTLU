<?php
class cl_ltct{

  private $conn;
  private $table = 'tb_ltct';

  //Posrt Properties
  public $ltct_id;
  public $LTDK_id;
  public $phongthi_ten;
  public $monthi_id;
  public $ltct_ngaythi;
  public $monhoc_ma;
  public $monhoc_ten;
  public $monthi_mota;
  public $kyhoc_id;
  public $cathi_ten;
  public $kyhoc_start;
  public $kyhoc_end;

  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }
  //READ -----------------------------------------------------------------------------------------------------------
  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM lichthict_phong';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }


  //UPDATE------------------------------------------------------------------------------------------------------------
  public function update(){
    //CREATE query
    $query = 'UPDATE tb_ltct
    SET
      cathi_ten = :cathi_ten,
      ltct_ngaythi = :ltct_ngaythi,
      phongthi_ten = :phongthi_ten
    WHERE
      ltct_id = :ltct_id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->ltct_id = htmlspecialchars(strip_tags($this->ltct_id));
    $this->cathi_ten = htmlspecialchars(strip_tags($this->cathi_ten));
    $this->ltct_ngaythi = htmlspecialchars(strip_tags($this->ltct_ngaythi));
    $this->phongthi_ten = htmlspecialchars(strip_tags($this->phongthi_ten));

    //Bind data
    $stmt->bindParam(':ltct_id',$this->ltct_id);
    $stmt->bindParam(':cathi_ten',$this->cathi_ten);
    $stmt->bindParam(':ltct_ngaythi',$this->ltct_ngaythi);
    $stmt->bindParam(':phongthi_ten',$this->phongthi_ten);

    //Execute query
    if ($stmt->execute()) {
      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }



  //DELETE ---------------------------------------------------------------------------------------------
  public function delete(){
    //CREATE query
    $query = 'DELETE FROM ' . $this->table . ' WHERE ltct_id = :ltct_id ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->ltct_id = htmlspecialchars(strip_tags($this->ltct_id));

    //Bind data
    $stmt->bindParam(':ltct_id',$this->ltct_id);

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
