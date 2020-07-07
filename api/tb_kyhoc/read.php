<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_kyhoc.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $kyhoc = new cl_kyhoc($db);

  //Blog post query

  $result = $kyhoc->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $kyhoc_arr = array();
    $kyhoc_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $kyhoc_item = array('kyhoc_id'=>$kyhoc_id,'kyhoc_ten'=>$kyhoc_ten,'namhoc_ten'=>$namhoc_ten);

      //Push to "data"

      array_push($kyhoc_arr['data'],$kyhoc_item);
    }
    //Turn to JSON & output

    echo json_encode($kyhoc_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong Co Ky Hoc'));
  };

 ?>
