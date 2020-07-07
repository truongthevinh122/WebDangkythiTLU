<?php
if (isset($_POST['edit'])) {
$data = array("ltct_id"=>$_POST["ltct_id"],"cathi_ten" => $_POST['cathi_ten'],"phongthi_ten" => $_POST['phongthi_ten'],"ltct_ngaythi" => $_POST['ltct_ngaythi']);
}
else {
  $data = array();
}
$data_string = json_encode($data);

$chkt = curl_init('http://localhost:8235/api.dangkythi/api/tb_ltct/update.php');
curl_setopt($chkt, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($chkt, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($chkt, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chkt, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($chkt);

$message = json_decode($result,JSON_PRETTY_PRINT);
header('Location: ' . $_SERVER['HTTP_REFERER'].'&message='.$message['message'].'');
curl_close($chkt);
?>
