
<?php
$filterky ="";
  if(isset($_GET['sumbitKy'])){
      $filterky = $_GET['kyhoc_id'];
  }
?>
<?php

$chltct = curl_init('http://localhost:8235/api.dangkythi/api/tb_ltct/read.php');
curl_setopt($chltct, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chltct, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chltct, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chltct);

curl_close($chltct);
$ltct = json_decode($result,JSON_PRETTY_PRINT);
?>



<div class="panel-heading">

</div>
<div class="panel-body">
    <div class="table-responsive">
<?php if($filterky!=""){ ?>

</table>
<table class="table table-bordered table-hover" id="dataTables-ltdk">
    <thead>
        <tr>
            <th style="width:3%;">STT</th>
            <th style="width:10%;">Mã Môn</th>
            <th style="width:20%;">Tên Môn</th>
            <th style="width:10%;">Ca Thi</th>
            <th>Phòng thi</th>
            <th style="width:24%;">Ngày Thi</th>
            <th hidden></th>
            <th style="width:12%;">Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($ltct['data']); $i++) {
        if ($ltct['data'][$i]['kyhoc_id']==$filterky) {

          ?>
          <tr>
            <td></td>
            <td><?php echo $ltct['data'][$i]['monhoc_ma'] ?></td>
            <td><?php echo $ltct['data'][$i]['monhoc_ten'];
                      if ($ltct['data'][$i]['monthi_mota'] == 1)
                      {
                        echo " (TL)";
                      };

             ?></td>
            <td><?php echo $ltct['data'][$i]['cathi_ten'] ?></td>
            <td><?php echo $ltct['data'][$i]['phongthi_ten'] ?></td>
            <td><?php echo $ltct['data'][$i]['ltct_ngaythi'] ?></td>
            <td hidden><?php echo $ltct['data'][$i]['ltct_id'] ?></td>
              <td class="center">
                <a class="open-button openFormEdit" >Edit</a>
                <a href="/api.dangkythi/control/lichthidukien/delete.php?LTDK_id=<?php echo $ltct['data'][$i]['ltct_id'] ?>"
                  onclick="return checkDelete()">Delete</a>
            </td>
          </tr>
      <?php }} ?>

    </tbody>
  </table>

<?php } ?>
</div>
</div>
<?php include('../control/lichthichinhthuc/EditForm.php') ?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa môn này?');
}

</script>
