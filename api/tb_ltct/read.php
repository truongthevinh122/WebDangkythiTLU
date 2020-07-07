<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_lichthichinhthuc.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $ltct = new cl_ltct($db);

  //Blog post query

  $result = $ltct->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $ltct_arr = array();
    $ltct_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $ltct_item = array('ltct_id'=>$ltct_id,
                          'LTDK_id'=>$LTDK_id,
                          'phongthi_ten'=>$phongthi_ten,
                          'monthi_id'=>$monthi_id,
                          'ltct_ngaythi'=>$ltct_ngaythi,
                          'monhoc_ma'=>$monhoc_ma,
                          'monhoc_ten'=>$monhoc_ten,
                          'monthi_mota'=>$monthi_mota,
                          'kyhoc_id'=>$kyhoc_id,
                          'cathi_ten'=>$cathi_ten,
                          'kyhoc_start'=>$kyhoc_start,
                          'kyhoc_end'=>$kyhoc_end,
    );

      //Push to "data"

      array_push($ltct_arr['data'],$ltct_item);
    }
    //Turn to JSON & output

    echo json_encode($ltct_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong co du lieu'));
  };

 ?>
