<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'dangkythitlu';

$conn = new PDO('mysql:host='. $server_host .';dbname='. $database, $server_username, $server_password);


?>
