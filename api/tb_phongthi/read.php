<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_phongthi.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $phongthi = new cl_phongthi($db);

  //Blog post query

  $result = $phongthi->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $phongthi_arr = array();
    $phongthi_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $phongthi_item = array('phongthi_ten'=>$phongthi_ten,'phongthi_loai'=>$phongthi_loai,'phongthi_sl'=>$phongthi_sl);

      //Push to "data"

      array_push($phongthi_arr['data'],$phongthi_item);
    }
    //Turn to JSON & output

    echo json_encode($phongthi_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong Co Ca Thi Nao'));
  };

 ?>
