<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_cathi.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $cathi = new cl_cathi($db);

  //Blog post query

  $result = $cathi->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $cathi_arr = array();
    $cathi_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $cathi_item = array('cathi_ten'=>$cathi_ten,'batdau'=>$batdau,'ketthuc'=>$ketthuc);

      //Push to "data"

      array_push($cathi_arr['data'],$cathi_item);
    }
    //Turn to JSON & output

    echo json_encode($cathi_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong Co Ca Thi Nao'));
  };

 ?>
