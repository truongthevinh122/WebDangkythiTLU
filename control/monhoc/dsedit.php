<?php
$data = array();
$data_string = json_encode($data);

$ch = curl_init('http://localhost:8235/api.dangkythi/api/tb_monhoc/read.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json',
  'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);

curl_close($ch);
$monhoc = json_decode($result,JSON_PRETTY_PRINT);

?>

<?php include('../control/monhoc/AddForm.php') ?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã Môn</th>
            <th>Tên Môn</th>
            <th>Bộ Môn</th>
            <th>Edit/Delete</th>
        </tr>
    </thead>
    <tbody>

      <?php
      for ($i=0; $i < count($monhoc['data']); $i++) {
        ?>
        <tr class="odd gradeX">
          <td></td>
          <td><?php echo $monhoc['data'][$i]['monhoc_ma'] ?></td>
          <td><?php echo $monhoc['data'][$i]['monhoc_ten'] ?></td>
          <td><?php echo $monhoc['data'][$i]['bomon_ten'] ?></td>
          <td class="center"> <a class="open-button" onclick="openFormEdit()">Edit</a>
          /<a href="/api.dangkythi/control/monhoc/delete.php?monhoc_ma=<?php echo $monhoc['data'][$i]['monhoc_ma'] ?>" onclick="return checkDelete()">Delete</a>
        </td>
        </tr>
      <?php
      }


       ?>

    </tbody>
  </table>


<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Bạn có chắc chắn muốn xóa môn học này?');
}

</script>
