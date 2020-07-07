<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: DELETE');
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

  //SET ID to DELETE
  $kyhoc->kyhoc_id = $data->kyhoc_id;


  //DELETE Post
  if($kyhoc->delete())
  {
    echo json_encode(array('message'=>'Ky hoc Deleted'));

  } else {
    echo json_encode(array('message'=>'Ky hoc Not Deleted'));
  }

?>
