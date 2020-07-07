
<?php

$chmon = curl_init('http://localhost:8235/api.dangkythi/api/tb_monthi/read.php');
curl_setopt($chmon, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($chmon, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chmon, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chmon);

curl_close($chmon);
$monthi = json_decode($result,JSON_PRETTY_PRINT);
$ltdk_monthi_id = array();
for ($i=0; $i < count($ltdk_mon['data']); $i++)
{
  array_push($ltdk_monthi_id,$ltdk_mon['data'][$i]['monthi_id']);
}
?>


<style>
.form-popup {
  width: 25%;
  margin: 50px auto;
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
}

.input-group {
    margin: 10px 0px 10px 0px;
}
.input-group label {
    display: block;
    text-align: left;
    margin: 3px;
}
.input-group input {
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

<div class="form-popup" id="EditForm">

  <form method="post" action="/api.dangkythi/control/lichthidukien/edit.php" enctype="multipart/form-data" class="form-container">
    <div class="input-group">
			<input type="hidden" name="LTDK_id" id="LTDK_id" hidden>
		</div>
    <div class="input-group">
			<input type="text" name="monthi_id" id="monthi_id" hidden>
		</div>
    <div class="input-group">
			<label>Mã Môn</label>
			<input type="text" name="monhoc_ma" id="monhoc_ma" disabled>
		</div>
    <div class="input-group">
			<label>Tên Môn</label>
			<input type="text" name="monhoc_ten" id="monhoc_ten" disabled>
		</div>
    <div class="input-group">
			<label>Ca thi</label>
      <select class="form-control" name="cathi_ten" id="cathi_ten" required>
        <option disabled selected value="">Chọn ca</option>
        <option value="1-4">1-4</option>
        <option value="1-2">1-2</option>
        <option value="3-4">3-4</option>
        <option value="3-5">3-5</option>
      </select>
		</div>
    <div class="input-group">
			<label>Ngày thi</label>
      <input type="date" name="LTDK_ngaythi" id="LTDK_ngaythi" required>
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
    $('#LTDK_id').val(dataktmh[5]);
    $('#monthi_id').val(dataktmh[6]);
    $('#cathi_ten').val(dataktmh[3]);
    $('#LTDK_ngaythi').val(dataktmh[4]);
  });


function closeFormEdit() {
  console.clear();
  document.getElementById("EditForm").style.display = "none";
}
</script>
