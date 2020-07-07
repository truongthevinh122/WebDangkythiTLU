<?php
if (isset($_POST['addCathi'])) {
$data = array("cathi_ten" => $_POST['cathi_ten'],"batdau" => $_POST['batdau'],"ketthuc" => $_POST['ketthuc']);
}
else {
  $data = array();
}
$data_string = json_encode($data);

$chnam = curl_init('http://localhost:8235/api.dangkythi/api/tb_cathi/create.php');
curl_setopt($chnam, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($chnam, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($chnam, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chnam, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($chnam);

$message = json_decode($result,JSON_PRETTY_PRINT);
header('Location: ../../pages/quanlydulieu.php?message='.$message['message'].'');
curl_close($chnam);
?>
