<?php
if (isset($_POST['add'])) {
$data = array("monhoc_ma" => $_POST['monhoc_ma'],"monthi_mota" => $_POST['monthi_mota'],"kyhoc_id" => $_POST['kyhoc_id']);
}
else {
  $data = array();
}
$data_string = json_encode($data);

$chkt = curl_init('http://localhost:8235/api.dangkythi/api/tb_monthi/create.php');
curl_setopt($chkt, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($chkt, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($chkt, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chkt, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($chkt);

$message = json_decode($result,JSON_PRETTY_PRINT);
header('Location: ../../pages/danhsachmonthilai.php?kyhoc_id='.$_POST['kyhoc_id'].'&&sumbitKy=&&message='.$message['message'].'');
curl_close($chkt);
?>
