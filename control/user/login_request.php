<?php
$data = array("user_username" => $_POST['username'], "user_pass" => $_POST['password']);
$data_string = json_encode($data);

$ch = curl_init('http://localhost:8235/api.dangkythi/api/tb_user/login.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);

curl_close($ch);
echo $result;

?>
