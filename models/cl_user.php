<?php
class user{

  private $conn;
  private $table = 'user';

  //Posrt Properties
  public $user_id;
  public $user_username;
  public $user_pass;
  public $user_permis;

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
    $query = 'SELECT * FROM '. $this->table . ' WHERE user_id = ? ';

    //prepare Statement
    $stmt = $this->conn->prepare($query);

    //Bind ID
    $stmt->bindParam(1,$this->user_id);
    //Execute Query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //Set properties
    $this->user_username = $row['user_username'];
    $this->user_pass = $row['user_pass'];
    $this->user_permis = $row['user_permis'];
  }

  //CREATE POST
  public function create(){
    //CREATE query
    $query = 'INSERT INTO '. $this->table . '
    SET
      user_username = :user_username,
      user_pass = :user_pass,
      user_permis = :user_permis';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->user_username = htmlspecialchars(strip_tags($this->user_username));
    $this->user_pass = htmlspecialchars(strip_tags($this->user_pass));
    $this->user_permis = htmlspecialchars(strip_tags($this->user_permis));


    //Bind data
    $stmt->bindParam(':user_username',$this->user_username);
    $stmt->bindParam(':user_pass',$this->user_pass);
    $stmt->bindParam(':user_permis',$this->user_permis);

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
      user_username = :user_username,
      user_pass = :user_pass,
      user_permis = :user_permis
    WHERE
      user_id = :user_id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean data
    $this->user_username = htmlspecialchars(strip_tags($this->user_username));
    $this->user_pass = htmlspecialchars(strip_tags($this->user_pass));
    $this->user_permis = htmlspecialchars(strip_tags($this->user_permis));
    $this->user_id = htmlspecialchars(strip_tags($this->user_id));

    //Bind data
    $stmt->bindParam(':user_username',$this->user_username);
    $stmt->bindParam(':user_pass',$this->user_pass);
    $stmt->bindParam(':user_permis',$this->user_permis);
    $stmt->bindParam(':user_id',$this->user_id);

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
    $query = 'DELETE FROM ' . $this->table . ' WHERE user_id = :user_id ';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    //Clean Data
    $this->user_id = htmlspecialchars(strip_tags($this->user_id));

    //Bind data
    $stmt->bindParam(':user_id',$this->user_id);

    //Execute query
    if ($stmt->execute()) {
      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }

  //Login
  public function login(){
    $query = 'SELECT *
    FROM '. $this->table .' WHERE user_username = :user_username AND user_pass = :user_pass';

    $stmt = $this->conn->prepare($query);
    $this->user_username = htmlspecialchars(strip_tags($this->user_username));
    $this->user_pass = htmlspecialchars(strip_tags($this->user_pass));

    $stmt->bindParam(':user_username',$this->user_username);
    $stmt->bindParam(':user_pass',$this->user_pass);

    if ($stmt->execute()) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $this->user_username = $row['user_username'];
      $this->user_pass = $row['user_pass'];
      $this->user_permis = $row['user_permis'];

      return true;
    }

    //Print ERROR if something go wrong
    printf("ERROR: %s.\n",$stmt->error);

    return false;

  }

}

 ?>
