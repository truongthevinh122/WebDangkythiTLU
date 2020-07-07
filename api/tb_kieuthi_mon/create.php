<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: POST ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_kieuthi_mon.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $ktmh = new cl_kieuthi_monhoc($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  if($data->monhoc_ma == null){
    echo json_encode(array('message'=>'Dang ky kieu thi khong thanh cong'));
  }
  else{

  $ktmh->monhoc_ma = $data->monhoc_ma;
  $ktmh->kieuthi_ten = $data->kieuthi_ten;
  $ktmh->namhoc_ten = $data->namhoc_ten;


  //Create Post

  if($ktmh->create())
  {
    echo json_encode(array('message'=>'Dang ky kieu thi thanh cong'));

  } else {
    echo json_encode(array('message'=>'Dang ky kieu thi khong thanh cong'));
  }
}

?>
