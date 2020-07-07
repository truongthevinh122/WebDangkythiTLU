
<?php

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

<div class="form-popup" id="EditForm">

  <form method="post" action="/api.dangkythi/control/kieuthi_mon/edit.php" enctype="multipart/form-data" class="form-container">
    <div class="input-group">
			<input type="hidden" name="ktmh_id" id="ktmh_id" >
		</div>
    <div class="input-group">
			<label>Mã Mon</label>
			<input type="text" name="monhoc_ma" id="monhoc_ma" disabled >
		</div>
    <div class="input-group">
			<label>Môn học</label>
			<input type="text" name="monhoc_ten" id="monhoc_ten" disabled >
		</div>
    <div class="input-group">
			<label>Kiểu thi</label>
      <select class="form-control" name="kieuthi_ten" style=" width:100%;" required>
        <option  disabled selected>Chọn kiểu thi</option>
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
    <button type="submit" name="edit" class="btn btn-primary">Update</button>
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
    $('#ktmh_id').val(dataktmh[5]);
    $('#monhoc_ma').val(dataktmh[1]);
    $('#monhoc_ten').val(dataktmh[2]);
  });


function closeFormEdit() {
  console.clear();
  document.getElementById("EditForm").style.display = "none";
}
</script>
