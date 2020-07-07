
<?php

$chmon = curl_init('http://localhost:8235/api.dangkythi/api/tb_monhoc/read.php');
curl_setopt($chmon, CURLOPT_CUSTOMREQUEST, "GET");

curl_setopt($chmon, CURLOPT_RETURNTRANSFER, true);
curl_setopt($chmon, CURLOPT_HTTPHEADER, array(
  'Content-Type: application/json')
);

$result = curl_exec($chmon);

curl_close($chmon);
$monhoc = json_decode($result,JSON_PRETTY_PRINT);

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

<div class="form-popup" id="AddForm">

  <form method="post" action="/api.dangkythi/control/kieuthi_mon/add.php" enctype="multipart/form-data" class="form-container">
    <div class="input-group">
			<label>Môn học</label>
			<select class="form-control" name="monhoc_ma" style=" width:100%;" required>
        <option value="" disabled selected>Chọn môn học</option>
        <?php
        for ($i=0; $i < count($monhoc['data']); $i++) {
          ?>
          <option value="<?php echo $monhoc['data'][$i]['monhoc_ma'] ?>">
            <?php echo ''.$monhoc['data'][$i]['monhoc_ma'].' - '.$monhoc['data'][$i]['monhoc_ten'].''; ?>
          </option>
        <?php } ?>
      </select>
		</div>
    <div class="input-group">
			<label>Kiểu thi</label>
      <select class="form-control" name="kieuthi_ten" style=" width:100%;" required>
        <option value="" disabled selected>Chọn kiểu thi</option>
        <?php for ($i=0; $i < count($kieuthi['data']); $i++) { ?>
          <option value="<?php echo $kieuthi['data'][$i]['kieuthi_ten'] ?>">
            <?php echo $kieuthi['data'][$i]['kieuthi_ten'] ?>
          </option>
        <?php } ?>
      </select>
		</div>
    <div class="input-group">
      <input type="hidden" name="namhoc_ten" value="<?php echo $filternam ?>">
    </div>
    <button type="submit" name="add" class="btn btn-primary">Add</button>
    <button type="button" class="btn btn-danger" onclick="closeFormAdd()">Close</button>
  </form>
</div>


<script>
function openFormAdd() {
  document.getElementById("AddForm").style.display = "block";
}

function closeFormAdd() {
  document.getElementById("AddForm").style.display = "none";
}
</script>
