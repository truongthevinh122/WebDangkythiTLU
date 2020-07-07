<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: POST ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_lichthidukien.php';


  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $ltdk = new cl_ltdk($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $ltdk->monthi_id = $data->monthi_id;
  $ltdk->cathi_ten = $data->cathi_ten;
  $ltdk->LTDK_ngaythi = $data->LTDK_ngaythi;

  if($ltdk->monthi_id == null ){

    echo json_encode(array('message'=>'Not Created'));
  }
  else {

    if($ltdk->create())
    {
      echo json_encode(array('message'=>'Created'));

    } else {
      echo json_encode(array('message'=>'Not Created'));
    }
  }


?>
