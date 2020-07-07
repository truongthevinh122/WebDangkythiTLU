<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: POST ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_kieuthi.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $post = new cl_kieuthi($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $post->kieuthi_ten = $data->kieuthi_ten;
  $post->kieuthi_hinhthuc = $data->kieuthi_hinhthuc;
  $post->kieuthi_mota = $data->kieuthi_mota;


  //Create Post

  if($post->create())
  {
    echo json_encode(array('message'=>'Kieu thi Created'));

  } else {
    echo json_encode(array('message'=>'Kieu thi Not Created'));
  }

?>
