<?php
if (isset($_POST['addKyhoc'])) {
$kyhoc_ten=''.$_POST['kyhoc_ten1'].' '.$_POST['kyhoc_ten2'].'';
$dataky = array("kyhoc_ten" =>$kyhoc_ten,"namhoc_ten" => $_POST['namhoc_ten']);
}
else {
  $dataky = array();
}
$dataky_string = json_encode($dataky);

$chky = curl_init('http://localhost:8235/api.dangkythi/api/tb_kyhoc/create.php');
curl_setopt($chky, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($chky, CURLOPT_POSTFIELDS, $dataky_string);
curl_setopt($chky, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chky, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($dataky_string))
);

$result = curl_exec($chky);
$message = json_decode($result,JSON_PRETTY_PRINT);
header('Location: ../../pages/quanlydulieu.php?message='.$message['message'].'');
curl_close($chky);
?>
