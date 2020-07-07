
<?php

$chphong = curl_init('http://localhost:8235/api.dangkythi/api/tb_phongthi/read.php');
curl_setopt($chphong, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($chphong, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chphong, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chphong);

curl_close($chphong);
$phongthi = json_decode($result,JSON_PRETTY_PRINT);

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


<style>
.form-popup-2 {
  width: 25%;
  margin: auto auto;
  position: fixed;
  text-align: left;
  padding: 20px;
  border: 1px solid #bbbbbb;
  background-color: white;
  border-radius: 5px;
  display: none;
  z-index: 9;
  bottom: 30%;
  right: 30%;
  top: 10%;
}

.input-group-2 {
    margin: 10px 0px 10px 0px;
}
.input-group-2 label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group-2 input {
    height: 30px;
    width: 96%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
}
.msg {
    margin: 30px auto;
    padding: 10px;
    border-radius: 5px;
    color: #3c763d;
    background: #dff0d8;
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
}

</style>

<div class="form-popup-2" id="EditForm">

  <form method="post" action="/api.dangkythi/control/lichthichinhthuc/edit.php" enctype="multipart/form-data" class="form-container">
    <div class="input-group-2">
			<input type="hidden" name="ltct_id" id="ltct_id" hidden>
		</div>
    <div class="input-group-2">
			<label>Mã Môn</label>
			<input type="text" name="monhoc_ma" id="monhoc_ma" disabled>
		</div>
    <div class="input-group-2">
			<label>Tên Môn</label>
			<input type="text" name="monhoc_ten" id="monhoc_ten" disabled>
		</div>
    <div class="input-group-2">
			<label>Ca thi</label>
      <select class="form-control" name="cathi_ten" id="cathi_ten" required>
        <option disabled selected value="">Chọn ca</option>
        <?php
          for ($i=0; $i < count($cathi['data']); $i++) {
         ?>
         <option value="<?php echo $cathi['data'][$i]['cathi_ten'] ?>">
           <?php echo $cathi['data'][$i]['cathi_ten'] ?>
         </option>
       <?php } ?>
      </select>
		</div>
    <div class="input-group-2">
			<label>Phòng thi</label>
      <select class="form-control" name="phongthi_ten" id="phongthi_ten" required>
        <option disabled selected value="">Chọn phòng thi</option>
        <?php
          for ($i=0; $i < count($phongthi['data']); $i++) {
         ?>
         <option value="<?php echo $phongthi['data'][$i]['phongthi_ten'] ?>">
           <?php echo $phongthi['data'][$i]['phongthi_ten'] ?>
         </option>
       <?php } ?>
      </select>
		</div>
    <div class="input-group-2">
			<label>Ngày thi</label>
      <input type="date" name="ltct_ngaythi" id="ltct_ngaythi"
      max="<?php echo $kyhoc['data'][$_GET['kyhoc_posit']]['kyhoc_end'] ?>" min="<?php echo $kyhoc['data'][$_GET['kyhoc_posit']]['kyhoc_start'] ?>"
      required>
		</div>
    <button type="submit" name="edit" class="btn btn-primary">OK</button>
    <button type="button" class="btn btn-danger" onclick="closeFormEdit()">Close</button>
  </form>
</div>


<script>
  $('.openFormEdit').on('click',function(){
    document.getElementById("EditForm").style.display = "block";
    $tr = $(this).closest("tr");
    var dataktmh = $tr.children("td").map(function(){
      return $(this).text();
    }).get();
    console.log(dataktmh);
    $('#monhoc_ma').val(dataktmh[1]);
    $('#monhoc_ten').val(dataktmh[2]);
    $('#ltct_id').val(dataktmh[6]);
    $('#cathi_ten').val(dataktmh[3]);
    $('#phongthi_ten').val(dataktmh[4]);
    $('#ltct_ngaythi').val(dataktmh[5]);
  });


function closeFormEdit() {
  console.clear();
  document.getElementById("EditForm").style.display = "none";
}
</script>
