<?php
if (isset($_POST['add'])) {
$data = array("monhoc_ma" => $_POST['monhoc_ma'],"monhoc_ten" => $_POST['monhoc_ten'],"bomon_ma" => $_POST['bomon_ma']);
}
else {
  $data = array();
}
$data_string = json_encode($data);

$ch = curl_init('http://localhost:8235/api.dangkythi/api/tb_monhoc/create.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);

$message = json_decode($result,JSON_PRETTY_PRINT);
header('Location: ../../pages/editmonhoc.php?message='.$message['message'].'');
curl_close($ch);
?>
