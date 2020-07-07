<?php

$chca = curl_init('http://localhost:8235/api.dangkythi/api/tb_cathi/read.php');
curl_setopt($chca, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chca, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chca, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chca);

curl_close($chca);
$cathi = json_decode($result,JSON_PRETTY_PRINT);

?>

<div class="panel-heading">
  Năm học
  <?php include('../control/cathi/AddForm.php') ?>
  <a class="btn btn-primary open-button" onclick="openFormAddCa()">Add</a>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Ca Thi</th>
            <th>Bắt đầu</th>
            <th>Kết thúc</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($cathi['data']); $i++) {
        ?>
        <tr class="odd gradeX">
          <td><?php echo $cathi['data'][$i]['cathi_ten'] ?></td>
          <td><?php echo $cathi['data'][$i]['batdau'] ?></td>
          <td><?php echo $cathi['data'][$i]['ketthuc'] ?></td>
          <td><a href="/api.dangkythi/control/cathi/delete.php?cathi_tenn=<?php echo $cathi['data'][$i]['cathi_id'] ?>" onclick="return checkDelete()">Delete</a></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
</div>
</div>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa?');
}

</script>
