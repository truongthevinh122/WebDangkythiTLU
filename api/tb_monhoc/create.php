<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: POST ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_monhoc.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $post = new cl_monhoc($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->monhoc_ma = $data->monhoc_ma;
  $post->monhoc_ten = $data->monhoc_ten;
  $post->bomon_ma = $data->bomon_ma;


  //Create Post

  if($post->create())
  {
    echo json_encode(array('message'=>'Mon Hoc Created'));

  } else {
    echo json_encode(array('message'=>'Mon Hoc Not Created'));
  }

?>
