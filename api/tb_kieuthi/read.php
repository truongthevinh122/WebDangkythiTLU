<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json ');

    include_once '../../config/Database.php';
    include_once '../../models/cl_kieuthi.php';

    //Instantiate DB &connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $kieuthi = new cl_kieuthi($db);

    //Blog post query

    $result = $kieuthi->read();
    //Get row count
    $num = $result->rowCount();

    //Check if any post
    if ($num>0) {
        // code...
        //Post array
        $kieuthi_arr = array();
        $kieuthi_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $kieuthi_item = array('kieuthi_id'=>$kieuthi_id,'kieuthi_ten'=>$kieuthi_ten,'kieuthi_hinhthuc'=>$kieuthi_hinhthuc,'kieuthi_mota'=>$kieuthi_mota);

        //Push to "data"

        array_push($kieuthi_arr['data'],$kieuthi_item);
        }
        //Turn to JSON & output

        echo json_encode($kieuthi_arr);
    } else {
        // No post
        echo json_encode(array('message'=>'Khong Co Kieu Thi'));
    };

 ?>
