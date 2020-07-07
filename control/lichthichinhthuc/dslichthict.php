
<?php
$filterky ="";
  if(isset($_GET['sumbitKy'])){
      $filterky = $_GET['kyhoc_id'];
  }
?>
<?php

$chltdk = curl_init('http://localhost:8235/api.dangkythi/api/tb_ltdk/read.php');
curl_setopt($chltdk, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($chltdk, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chltdk, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chltdk);

curl_close($chltdk);
$ltdk_mon = json_decode($result,JSON_PRETTY_PRINT);
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
            <th hidden></th>
            <th style="width:12%;">Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($ltdk_mon['data']); $i++) {
        if ($ltdk_mon['data'][$i]['kyhoc_id']==$filterky) {
          if ($ltdk_mon['data'][$i]['cathi_ten']!=null and $ltdk_mon['data'][$i]['LTDK_ngaythi']!=null) {
          ?>
          <tr>
            <td></td>
            <td><?php echo $ltdk_mon['data'][$i]['monhoc_ma'] ?></td>
            <td><?php echo $ltdk_mon['data'][$i]['monhoc_ten'];
                      if ($ltdk_mon['data'][$i]['monthi_mota'] == 1)
                      {
                        echo " (TL)";
                      };

             ?></td>
            <td><?php echo $ltdk_mon['data'][$i]['cathi_ten'] ?></td>
            <td></td>
            <td><?php echo $ltdk_mon['data'][$i]['LTDK_ngaythi'] ?></td>
            <td hidden><?php echo $ltdk_mon['data'][$i]['LTDK_id'] ?></td>
            <td hidden><?php echo $ltdk_mon['data'][$i]['monthi_id'] ?></td>
              <td class="center">
                <a class="open-button openFormEdit" >Edit</a>
                <a href="/api.dangkythi/control/lichthidukien/delete.php?LTDK_id=<?php echo $ltdk_mon['data'][$i]['LTDK_id'] ?>"
                  onclick="return checkDelete()">Delete</a>
            </td>
          </tr>
      <?php }
        else {
          ?>
          <tr style="color: red">
            <td></td>
            <td><?php echo $ltdk_mon['data'][$i]['monhoc_ma'] ?></td>
            <td><?php echo $ltdk_mon['data'][$i]['monhoc_ten'];
                      if ($ltdk_mon['data'][$i]['monthi_mota'] == 1)
                      {
                        echo " (TL)";
                      };
            ?></td>
            <td><?php echo $ltdk_mon['data'][$i]['cathi_ten'] ?></td>
            <td></td>
            <td><?php echo $ltdk_mon['data'][$i]['LTDK_ngaythi'] ?></td>
            <td hidden><?php echo $ltdk_mon['data'][$i]['LTDK_id'] ?></td>
            <td hidden><?php echo $ltdk_mon['data'][$i]['monthi_id'] ?></td>
              <td class="center">
                <a class="open-button openFormEdit" >Edit</a>
                <a href="/api.dangkythi/control/lichthidukien/delete.php?LTDK_id=<?php echo $ltdk_mon['data'][$i]['LTDK_id'] ?>"
                  onclick="return checkDelete()">Delete</a>
            </td>
          </tr>
      <?php }}} ?>

    </tbody>
  </table>

<?php } ?>
</div>
</div>
<?php include('../control/lichthidukien/EditForm.php') ?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa môn này?');
}

</script>
