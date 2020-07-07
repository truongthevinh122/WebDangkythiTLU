<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: POST ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_kyhoc.php';


  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $kyhoc = new cl_kyhoc($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $kyhoc->kyhoc_ten = $data->kyhoc_ten;
  $kyhoc->namhoc_ten = $data->namhoc_ten;

  if($kyhoc->namhoc_ten == null ){

    echo json_encode(array('message'=>'Ky Hoc Not Created'));
  }
  else {
    if($kyhoc->create())
    {
      echo json_encode(array('message'=>'Ky Hoc Created'));

    } else {
      echo json_encode(array('message'=>'Ky Hoc Not Created'));
    }
  }


?>
