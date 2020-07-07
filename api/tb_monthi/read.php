<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_monthi.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $monthi = new cl_monthi($db);

  //Blog post query

  $result = $monthi->read();
  //Get row count
  $num = $result->rowCount();

  //Check if any post
  if ($num>0) {
    // code...
    //Post array
    $monthi_arr = array();
    $monthi_arr['data'] = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $monthi_item = array('monthi_id'=>$monthi_id,'monhoc_ma'=>$monhoc_ma,'monhoc_ten'=>$monhoc_ten,'monthi_mota'=>$monthi_mota,
                            'kyhoc_id'=>$kyhoc_id,'ktmh_id'=>$ktmh_id,'kieuthi_ten'=>$kieuthi_ten,
                            'kieuthi_mota'=>$kieuthi_mota
                          );

      //Push to "data"

      array_push($monthi_arr['data'],$monthi_item);
    }
    //Turn to JSON & output

    echo json_encode($monthi_arr);
  } else {
    // No post
    echo json_encode(array('message'=>'Khong Co Ky Hoc'));
  };

 ?>
