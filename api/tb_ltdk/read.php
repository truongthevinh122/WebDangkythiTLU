<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_lichthidukien.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $ltdk_mon = new cl_ltdk($db);

  //Blog post query

  $result = $ltdk_mon->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $ltdk_mon_arr = array();
    $ltdk_mon_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $ltdk_mon_item = array('LTDK_id'=>$LTDK_id,
                              'monthi_id'=>$monthi_id,
                              'monthi_mota'=>$monthi_mota,
                              'monhoc_ma'=>$monhoc_ma,
                              'kyhoc_id'=>$kyhoc_id,
                              'kyhoc_start'=>$kyhoc_start,
                              'kyhoc_end'=>$kyhoc_end,
                              'monhoc_ten'=>$monhoc_ten,
                              'cathi_ten'=>$cathi_ten,
                              'LTDK_ngaythi'=>$LTDK_ngaythi
    );

      //Push to "data"

      array_push($ltdk_mon_arr['data'],$ltdk_mon_item);
    }
    //Turn to JSON & output

    echo json_encode($ltdk_mon_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong co du lieu'));
  };

 ?>
