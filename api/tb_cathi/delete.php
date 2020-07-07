<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_cathi.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $cathi = new cl_cathi($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  //SET ID to DELETE
  $cathi->cathi_id = $data->cathi_id;


  //DELETE Post
  if($cathi->delete())
  {
    echo json_encode(array('message'=>'Nam hoc Deleted'));

  } else {
    echo json_encode(array('message'=>'Nam hoc Not Deleted'));
  }

?>
