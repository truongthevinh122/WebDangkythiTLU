<?php

//Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json ');
  header('Access-Control-Allow-Methods: POST ');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type ,Access-Control-Allow-Methods, Authorization, X-Requested-With ');

  include_once '../../config/Database.php';
  include_once '../../models/cl_user.php';

  //Instantiate DB &connect
  $database = new Database();
  $db = $database->connect();

    //Instantiate user object
    $user = new user($db);

    //GET ID
    $data = json_decode(file_get_contents("php://input"));

    $user->user_username = $data->user_username;
    $user->user_pass = $data->user_pass;

    if($user->user_username == null or $user->user_pass == null){

      $user_arr = array('islogin'=>false,'message'=>'Ten dang nhap va mat khau khong duoc de trong');
      echo json_encode($user_arr);
    }
    else {

    if($user->login())
    {
    //create array
    $user_arr = array('islogin'=>true,'username'=>$user->user_username,'password'=>$user->user_pass,'permission'=>$user->user_permis);

    echo json_encode($user_arr);
    }
    else {
      $user_arr = array('islogin'=>false,'message'=>'Sai ten dang nhap hoac mat khau');
      echo json_encode($user_arr);
    }
    }
?>
