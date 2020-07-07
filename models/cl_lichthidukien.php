<?php
class cl_ltdk{

  private $conn;
  private $table = 'tb_ltdk';

  //Posrt Properties
  public $LTDK_id;
  public $monthi_id;
  public $monhoc_ma;
  public $monhoc_ten;
  public $kyhoc_id;
  public $cathi_ten;
  public $LTDK_ngaythi;
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
            FROM lichthidukien_mon';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }


  //CREATE ----------------------------------------------------------------------------------------------------------
  public function create(){
    //CREATE query
    $query = 'INSERT INTO tb_ltdk
    (monthi_id, cathi_ten, LTDK_ngaythi)
    VALUES (:monthi_id, :cathi_ten, :LTDK_ngaythi)';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->monthi_id = htmlspecialchars(strip_tags($this->monthi_id));
    $this->cathi_ten = htmlspecialchars(strip_tags($this->cathi_ten));
    $this->LTDK_ngaythi = htmlspecialchars(strip_tags($this->LTDK_ngaythi));

    //Bind data
    $stmt->bindParam(':monthi_id',$this->monthi_id);
    $stmt->bindParam(':cathi_ten',$this->cathi_ten);
    $stmt->bindParam(':LTDK_ngaythi',$this->LTDK_ngaythi);


    //Execute query
    if ($stmt->execute()) {
      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }


  //UPDATE------------------------------------------------------------------------------------------------------------
  public function update(){
    //CREATE query
    $query = 'UPDATE tb_ltdk
    SET
      cathi_ten = :cathi_ten,
      LTDK_ngaythi = :LTDK_ngaythi
    WHERE
      LTDK_id = :LTDK_id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->LTDK_id = htmlspecialchars(strip_tags($this->LTDK_id));
    $this->cathi_ten = htmlspecialchars(strip_tags($this->cathi_ten));
    $this->LTDK_ngaythi = htmlspecialchars(strip_tags($this->LTDK_ngaythi));

    //Bind data
    $stmt->bindParam(':LTDK_id',$this->LTDK_id);
    $stmt->bindParam(':cathi_ten',$this->cathi_ten);
    $stmt->bindParam(':LTDK_ngaythi',$this->LTDK_ngaythi);

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
    $query = 'DELETE FROM ' . $this->table . ' WHERE LTDK_id = :LTDK_id ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->LTDK_id = htmlspecialchars(strip_tags($this->LTDK_id));

    //Bind data
    $stmt->bindParam(':LTDK_id',$this->LTDK_id);

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
