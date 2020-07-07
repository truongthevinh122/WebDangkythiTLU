<?php
class cl_phongthi{

  private $conn;
  private $table = 'tb_phongthi';

  //Posrt Properties
  public $phongthi_ten;
  public $phongthi_loai;
  public $phongthi_sl;


  //Constructor with Database
  public function __construct($db){
    $this->conn = $db;
  }

  public function read() {
    //CREATE Query
    $query = 'SELECT *
            FROM ' . $this->table .'
            ORDER BY phongthi_ten';


    //Prepare Statement
    $stmt = $this->conn->prepare($query);
    //Execute Query
    $stmt->execute();

    return $stmt;
  }


}

 ?>
