<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: PUT ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_lichthichinhthuc.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

  //Instantiate blog post object
  $ltdk = new cl_ltct($db);

  //GET the raw posted data
  $data = json_decode(file_get_contents("php://input"));

  //SET ID to Update
  $ltdk->ltct_id = $data->ltct_id;

  $ltdk->cathi_ten = $data->cathi_ten;
  $ltdk->phongthi_ten = $data->phongthi_ten;
  $ltdk->ltct_ngaythi = $data->ltct_ngaythi;

  //Update Post

  if($ltdk->update())
  {
    echo json_encode(array('message'=>'Update thanh cong'));

  } else {
    echo json_encode(array('message'=>'Update khong thanh cong'));
  }

?>
