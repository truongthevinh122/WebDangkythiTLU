<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_namhoc.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $namhoc = new cl_namhoc($db);

  //Blog post query

  $result = $namhoc->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $namhoc_arr = array();
    $namhoc_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $namhoc_item = array('namhoc_id'=>$namhoc_id,'namhoc_ten'=>$namhoc_ten);

      //Push to "data"

      array_push($namhoc_arr['data'],$namhoc_item);
    }
    //Turn to JSON & output

    echo json_encode($namhoc_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong Co Nam Hoc Nao'));
  };

 ?>
