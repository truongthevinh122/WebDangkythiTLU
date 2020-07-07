<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json ');

    include_once '../../config/Database.php';
    include_once '../../models/cl_monhoc.php';

    //Instantiate DB &connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $monhoc = new cl_monhoc($db);

    //Blog post query

    $result = $monhoc->read();
    //Get row count
    $num = $result->rowCount();

    //Check if any post
    if ($num>0) {
        // code...
        //Post array
        $monhoc_arr = array();
        $monhoc_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $monhoc_item = array('monhoc_id'=>$monhoc_id,'monhoc_ma'=>$monhoc_ma,'monhoc_ten'=>$monhoc_ten,'bomon_ma'=>$bomon_ma,'bomon_ten'=>$bomon_ten);

        //Push to "data"

        array_push($monhoc_arr['data'],$monhoc_item);
        }
        //Turn to JSON & output

        echo json_encode($monhoc_arr);
    } else {
        // No post
        echo json_encode(array('message'=>'Khong Co Mon Hoc Nao'));
    };

 ?>
