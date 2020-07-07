<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: POST ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_monthi.php';


  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $monthi = new cl_monthi($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));
  
  $monthi->monhoc_ma = $data->monhoc_ma;
  $monthi->monthi_mota = $data->monthi_mota;
  $monthi->kyhoc_id = $data->kyhoc_id;

  if($monthi->monhoc_ma == null ){

    echo json_encode(array('message'=>'Mon Thi Not Created'));
  }
  else {

    if($monthi->create())
    {
      echo json_encode(array('message'=>'Mon Thi Created'));

    } else {
      echo json_encode(array('message'=>'Mon Thi Not Created'));
    }
  }


?>
