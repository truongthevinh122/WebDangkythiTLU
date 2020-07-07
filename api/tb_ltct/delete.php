<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_lichthichinhthuc.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $ltct = new cl_ltct($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  //SET ID to DELETE
  $ltct->ltct = $data->ltct;


  //DELETE Post
  if($ltct->delete())
  {
    echo json_encode(array('message'=>'Deleted'));

  } else {
    echo json_encode(array('message'=>'Not Deleted'));
  }

?>
