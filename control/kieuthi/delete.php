<?php
$data = array("kieuthi_id" => $_GET['kieuthi_id']);
$data_string = json_encode($data);

$ch = curl_init('http://localhost:8235/api.dangkythi/api/tb_kieuthi/delete.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);

$message = json_decode($result,JSON_PRETTY_PRINT);
curl_close($ch);
header('Location: ../../pages/danhsachkieuthi.php?message='.$message['message'].'');
exit;
?>
