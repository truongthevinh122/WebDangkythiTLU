<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: DELETE');
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

  //SET ID to DELETE
  $monthi->monthi_id = $data->monthi_id;

  //DELETE Post
  if($monthi->delete())
  {
    echo json_encode(array('message'=>'Mon Thi Deleted'));

  } else {
    echo json_encode(array('message'=>'Mon Thi Not Deleted'));
  }

?>
