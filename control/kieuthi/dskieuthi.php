<?php
$data = array();
$data_string = json_encode($data);

$chkt = curl_init('http://localhost:8235/api.dangkythi/api/tb_kieuthi/read.php');
curl_setopt($chkt, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chkt, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chkt, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chkt);

curl_close($chkt);
$kieuthi = json_decode($result,JSON_PRETTY_PRINT);

?>


<div class="panel-heading">
  <?php
    if(@$_GET['message']==true){
      ?>
      <div class="alert alert-success">
      <?php echo $_GET['message']; ?>
      </div>
      <?php
    }
   ?>
  <?php include('../control/kieuthi/AddForm.php') ?>
  <a class="btn btn-primary open-button" onclick="openFormAdd()">Add</a>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover" id="dataTables-kieuthi">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên Kiểu thi</th>
            <th>Mô tả</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($kieuthi['data']); $i++) {
        ?>
        <tr class="odd gradeX">
          <td><?php echo $kieuthi['data'][$i]['kieuthi_id'] ?></td>
          <td><?php echo $kieuthi['data'][$i]['kieuthi_ten'] ?></td>
          <td><?php echo $kieuthi['data'][$i]['kieuthi_mota'] ?></td>
          <td>
            <a href="/api.dangkythi/control/kieuthi/delete.php?kieuthi_id=<?php echo $kieuthi['data'][$i]['kieuthi_id'] ?>" onclick="return checkDelete()">Delete</a></td>
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
