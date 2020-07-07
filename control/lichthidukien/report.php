

<?php

$ltdk_ngaythi = array();
for ($i=0; $i < count($ltdk_mon['data']); $i++)
{
  if ($ltdk_mon['data'][$i]['cathi_ten']!=null and $ltdk_mon['data'][$i]['LTDK_ngaythi']!=null)
  {
  array_push($ltdk_ngaythi,$ltdk_mon['data'][$i]['LTDK_ngaythi']);
  }
}
$ltdk_ngaythi = array_unique($ltdk_ngaythi);
$Smonthi=0;
 ?>
<div class="panel-body">
<div class="table-responsive">
<?php if($filterky!=""){ ?>

</table>
<table class="table table-bordered table-hover" id="dataTables-report">
    <thead>
        <tr>
            <th style="width:3%;">STT</th>
            <th style="width:10%;">Mã Môn</th>
            <th style="width:20%;">Tên Môn</th>
            <th style="width:10%;">Ca Thi</th>
            <th style="width:24%;">Ngày Thi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      for ($i=0; $i < count($ltdk_ngaythi); $i++)
      {
        ?>
        <tr>
          <td colspan=5 bgcolor="skyblue" style="text-align: center; font-weight: bold"><?php echo $ltdk_ngaythi[$i] ?></td>
        </tr>
        <?php
          for ($j=0; $j < count($ltdk_mon['data']); $j++)
           {
            if ($ltdk_mon['data'][$j]['kyhoc_id']==$filterky)
            {
              if ($ltdk_mon['data'][$j]['cathi_ten']!=null and $ltdk_mon['data'][$j]['LTDK_ngaythi']==$ltdk_ngaythi[$i])
              {
                $Smonthi+=1;
          ?>
                <tr>
                  <td></td>
                  <td><?php echo $ltdk_mon['data'][$j]['monhoc_ma'] ?></td>
                  <td><?php echo $ltdk_mon['data'][$j]['monhoc_ten'];
                            if($ltdk_mon['data'][$j]['monthi_mota'])
                            {
                              echo " (TL)";
                            };
                  ?></td>
                  <td><?php echo $ltdk_mon['data'][$j]['cathi_ten'] ?></td>
                  <td><?php echo $ltdk_mon['data'][$j]['LTDK_ngaythi'] ?></td>
                </tr>
      <?php   }
            }
          }
        } ?>

    </tbody>
    <tfoot>
      <tr>
          <th style="width:6%;">Tổng số: </th>
          <th colspan=2 style="text-align: right"><?php echo($Smonthi) ?> môn thi</th>
          <th>Số ngày thi:</th>
          <th style="text-align: right"><?php  echo(count($ltdk_ngaythi))?> ngày</th>
      </tr>
    </tfoot>
  </table>

<?php } ?>
</div>
</div>
