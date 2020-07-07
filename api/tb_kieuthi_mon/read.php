<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json ');

    include_once '../../config/Database.php';
    include_once '../../models/cl_kieuthi_mon.php';

    //Instantiate DB &connect
    $database = new Database();
    $db = $database->connect();

    //Instantiate blog post object
    $ktmh = new cl_kieuthi_monhoc($db);

    //Blog post query

    $result = $ktmh->read();
    //Get row count
    $num = $result->rowCount();

    //Check if any post
    if ($num>0) {
        // code...
        //Post array
        $ktmh_arr = array();
        $ktmh_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $ktmh_item = array(
        'ktmh_id'=>$ktmh_id,
        'monhoc_ma'=>$monhoc_ma,
        'monhoc_ten'=>$monhoc_ten,
        'kieuthi_ten'=>$kieuthi_ten,
        'kieuthi_mota'=>$kieuthi_mota,
        'namhoc_ten'=>$namhoc_ten
        );

        //Push to "data"

        array_push($ktmh_arr['data'],$ktmh_item);
        }
        //Turn to JSON & output

        echo json_encode($ktmh_arr);
    } else {
        // No post
        echo json_encode(array('message'=>'Khong Co Du Lieu'));
    };

 ?>
