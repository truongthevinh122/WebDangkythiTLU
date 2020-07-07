<?php

$chky = curl_init('http://localhost:8235/api.dangkythi/api/tb_kyhoc/read.php');
curl_setopt($chky, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chky, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chky, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chky);

curl_close($chky);
$kyhoc = json_decode($result,JSON_PRETTY_PRINT);

?>


<div class="panel-heading">
<table>
  <thead>
    <tr>
      <td>
        Chọn năm học:
        <div class="form-group">
          <form action="" method="get">
        <select class="btn" name="kyhoc_id">
          <option value="" disabled selected>Chọn kỳ học</option>
          <?php
          for ($i=0; $i < count($kyhoc['data']); $i++) {
            ?>
            <option value="<?php echo $kyhoc['data'][$i]['kyhoc_id']; ?>"><?php echo ''.$kyhoc['data'][$i]['kyhoc_ten'].' '.$kyhoc['data'][$i]['namhoc_ten'].'' ?></option>
          <?php } ?>
        </select>
          <button type="submit" name="sumbitKy" class="btn btn-primary btn-sm">submit</button>
        </form>
        </div>
      </td>
      <td>
        <?php
          if(@$_GET['message']==true){
            ?>
            <div class="alert alert-success">
            <?php echo $_GET['message'];
            ?>
            </div>
            <meta http-equiv="refresh" content="3;url=http://localhost:8235/api.dangkythi/pages/danhsachmonthilai.php?kyhoc_id=<?php echo $_GET['kyhoc_id'] ?>&sumbitKy=" />
            <?php
          }
         ?>
      </td>
    </tr>
  </thead>
</table>

</div>
