<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: PUT ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_kieuthi_mon.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $post = new cl_kieuthi_monhoc($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  //SET ID to Update
  $post->ktmh_id = $data->ktmh_id;

  $post->kieuthi_ten = $data->kieuthi_ten;

  //Update Post

  if($post->update())
  {
    echo json_encode(array('message'=>'Update thanh cong'));

  } else {
    echo json_encode(array('message'=>'Update khong thanh cong'));
  }

?>
