<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_bomon.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $bomon = new cl_bomon($db);

  //Blog post query

  $result = $bomon->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $bomon_arr = array();
    $bomon_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $bomon_item = array('bomon_id'=>$bomon_id,'bomon_ma'=>$bomon_ma,'bomon_ten'=>$bomon_ten);

      //Push to "data"

      array_push($bomon_arr['data'],$bomon_item);
    }
    //Turn to JSON & output

    echo json_encode($bomon_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong Co Bo Mon Nao'));
  };

 ?>
