
<?php
$filterky ="";
  if(isset($_GET['sumbitKy'])){
      $filterky = $_GET['kyhoc_id'];
  }
?>
<?php

$chmt = curl_init('http://localhost:8235/api.dangkythi/api/tb_monthi/read.php');
curl_setopt($chmt, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chmt, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chmt, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chmt);

curl_close($chmt);
$monthi = json_decode($result,JSON_PRETTY_PRINT);
?>
<div class="panel-heading">
  <button class="open-button btn btn-primary" onclick="openFormImport()">Import</button>
  <?php include('../control/monthi/importForm.php') ?>
  <?php include('../control/monthi/AddForm.php') ?>
  <a class="btn btn-primary open-button" onclick="openFormAdd()">Add</a>

</div>
<div class="panel-body">
    <div class="table-responsive">
<?php if($filterky!=""){ ?>

</table>
<table class="table table-striped table-bordered table-hover" id="dataTables-monthi">
    <thead>
        <tr>
            <th style="width:3%;">STT</th>
            <th style="width:10%;">Mã Môn</th>
            <th style="width:20%;">Tên Môn</th>
            <th style="width:10%;">Tên Kiểu thi</th>
            <th style="width:24%;">Mô tả</th>
            <th hidden>ID</th>
            <th style="width:12%;">Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($monthi['data']); $i++) {
        if ($monthi['data'][$i]['kyhoc_id']==$filterky and $monthi['data'][$i]['monthi_mota']==0) {
          ?>
          <tr class="odd gradeX">
            <td></td>
            <td><?php echo $monthi['data'][$i]['monhoc_ma'] ?></td>
            <td><?php echo $monthi['data'][$i]['monhoc_ten'] ?></td>
            <td><?php echo $monthi['data'][$i]['kieuthi_ten'] ?></td>
            <td><?php echo $monthi['data'][$i]['kieuthi_mota'] ?></td>
            <td hidden><?php echo $monthi['data'][$i]['monthi_id'] ?></td>
              <td class="center">
                <a href="/api.dangkythi/control/monthi/delete.php?kyhoc_id=<?php echo $_GET['kyhoc_id'] ?>&sumbitKy=&monthi_id=<?php echo $monthi['data'][$i]['monthi_id'] ?>"
                  onclick="return checkDelete()">Delete</a>
            </td>
          </tr>
      <?php }} ?>
    </tbody>
  </table>

<?php } ?>
</div>
</div>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa môn thi này?');
}

</script>
