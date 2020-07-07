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
