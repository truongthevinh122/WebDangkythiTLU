<?php
if (isset($_POST['add'])) {
$data = array("kieuthi_ten" => $_POST['kieuthi_ten'],"kieuthi_mota" => $_POST['kieuthi_mota'],"kieuthi_hinhthuc" => $_POST['kieuthi_hinhthuc']);
}
else {
  $data = array();
}
$data_string = json_encode($data);

$chkt = curl_init('http://localhost:8235/api.dangkythi/api/tb_kieuthi/create.php');
curl_setopt($chkt, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($chkt, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($chkt, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chkt, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($chkt);

$message = json_decode($result,JSON_PRETTY_PRINT);
header('Location: ../../pages/danhsachkieuthi.php?message='.$message['message'].'');
curl_close($chkt);
?>
