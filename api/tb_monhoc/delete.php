<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_monhoc.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $monhoc = new cl_monhoc($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  //SET ID to DELETE
  $monhoc->monhoc_ma = $data->monhoc_ma;


  //DELETE Post
  if($monhoc->delete())
  {
    echo json_encode(array('message'=>'Mon Hoc Deleted'));

  } else {
    echo json_encode(array('message'=>'Post Not Deleted'));
  }

?>
