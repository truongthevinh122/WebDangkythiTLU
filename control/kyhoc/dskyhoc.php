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
  Kỳ Học
  <?php include('../control/kyhoc/AddForm.php') ?>
  <a class="btn btn-primary open-button" onclick="openFormAddKy()">Add</a>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-kyhoc">
    <thead>
        <tr>
            <th>Kỳ Học</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($kyhoc['data']); $i++) {
        ?>
        <tr class="odd gradeX">
          <td><?php echo ''.$kyhoc['data'][$i]['kyhoc_ten'].' '.$kyhoc['data'][$i]['namhoc_ten'].''; ?></td>
          <td><a href="/api.dangkythi/control/kyhoc/delete.php?kyhoc_id=<?php echo $kyhoc['data'][$i]['kyhoc_id'] ?>" onclick="return checkDelete()">Delete</a></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
</div>
</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa kỳ học này?');
}

</script>
