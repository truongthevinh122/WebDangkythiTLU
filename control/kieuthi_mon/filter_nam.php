<?php

$chnam = curl_init('http://localhost:8235/api.dangkythi/api/tb_namhoc/read.php');
curl_setopt($chnam, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chnam, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chnam, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chnam);

curl_close($chnam);
$namhoc = json_decode($result,JSON_PRETTY_PRINT);

?>


<div class="panel-heading">
<table>
  <thead>
    <tr>
      <td>
        Chọn năm học:
        <div class="form-group">
          <form action="" method="get">
        <select class="btn" name="namhoc">
          <option value="" disabled selected>Chọn năm học</option>
          <?php
          for ($i=0; $i < count($namhoc['data']); $i++) {
            ?>
            <option><?php echo $namhoc['data'][$i]['namhoc_ten'] ?></option>
          <?php } ?>
        </select>
          <button type="submit" name="sumbitNam" class="btn btn-primary btn-sm">submit</button>
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
            <meta http-equiv="refresh" content="3;url=http://localhost:8235/api.dangkythi/pages/dangkykieuthi.php?namhoc=<?php echo $_GET['namhoc'] ?>&sumbitNam=" />
            <?php
          }
         ?>
      </td>
    </tr>
  </thead>
</table>

</div>
