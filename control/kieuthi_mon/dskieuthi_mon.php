
<?php
$filternam ="";
  if(isset($_GET['sumbitNam'])){
      $filternam = $_GET['namhoc'];
  }
?>
<?php

$chktm = curl_init('http://localhost:8235/api.dangkythi/api/tb_kieuthi_mon/read.php');
curl_setopt($chktm, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chktm, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chktm, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chktm);

curl_close($chktm);
$ktmh = json_decode($result,JSON_PRETTY_PRINT);
?>
<div class="panel-heading">
  <button class="open-button btn btn-primary" onclick="openFormImport()">Import</button>
  <?php include('../control/kieuthi_mon/importForm.php') ?>
  <?php include('../control/kieuthi_mon/AddForm.php') ?>
  <a class="btn btn-primary open-button" onclick="openFormAdd()">Add</a>

</div>
<div class="panel-body">
    <div class="table-responsive">
<?php if($filternam!=""){ ?>

</table>
<table class="table table-striped table-bordered table-hover" id="dataTables-ktmh">
    <thead>
        <tr>
            <th style="width:3%;">STT</th>
            <th style="width:10%;">Mã Môn học</th>
            <th style="width:20%;">Tên Môn học</th>
            <th style="width:10%;">Tên Kiểu thi</th>
            <th style="width:24%;">Mô tả</th>
            <th hidden>ID</th>
            <th style="width:12%;">Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($ktmh['data']); $i++) {
        if ($ktmh['data'][$i]['namhoc_ten']==$filternam) {
          ?>
          <tr class="odd gradeX">
            <td></td>
            <td><?php echo $ktmh['data'][$i]['monhoc_ma'] ?></td>
            <td><?php echo $ktmh['data'][$i]['monhoc_ten'] ?></td>
            <td><?php echo $ktmh['data'][$i]['kieuthi_ten'] ?></td>
            <td><?php echo $ktmh['data'][$i]['kieuthi_mota'] ?></td>
            <td hidden><?php echo $ktmh['data'][$i]['ktmh_id'] ?></td>
              <td class="center">
                <a class="open-button openFormEdit" >Edit</a>
                <a href="/api.dangkythi/control/kieuthi_mon/delete.php?namhoc=<?php echo $filternam ?>&sumbitNam=&
            ktmh_id=<?php echo $ktmh['data'][$i]['ktmh_id'] ?>"
              onclick="return checkDelete()">Delete</a>
            </td>
          </tr>
      <?php }} ?>
    </tbody>
  </table>

<?php } ?>
</div>
</div>
<?php include('../control/kieuthi_mon/EditForm.php') ?>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa môn học này?');
}

</script>
