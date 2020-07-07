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
  Năm học
  <?php include('../control/namhoc/AddForm.php') ?>
  <a class="btn btn-primary open-button" onclick="openFormAddNam()">Add</a>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-namhoc">
    <thead>
        <tr>
            <th>Năm Học</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($namhoc['data']); $i++) {
        ?>
        <tr class="odd gradeX">
          <td><?php echo $namhoc['data'][$i]['namhoc_ten'] ?></td>
          <td><a href="/api.dangkythi/control/namhoc/delete.php?namhoc_ten=<?php echo $namhoc['data'][$i]['namhoc_ten'] ?>" onclick="return checkDelete()">Delete</a></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
</div>
</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa năm học này?');
}

</script>
