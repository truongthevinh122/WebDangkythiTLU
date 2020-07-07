<style>
.form-popup {
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
  top: 10%;
  bottom: 10%;
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

<div class="form-popup" id="AddFormKy">

  <form method="post" action="/api.dangkythi/control/kyhoc/add.php" enctype="multipart/form-data" class="form-container">
    <div class="input-group">
			<label>Kỳ học</label>
			<select class="form-control" name="kyhoc_ten1">
        <option selected disabled>Chọn Kỳ</option>
        <option value="Học kỳ I">Học kỳ I</option>
        <option value="Học kỳ II">Học kỳ II</option>
        <option value="Học kỳ III">Học kỳ III</option>
      </select>
		</div>
    <div class="input-group">
			<label>Nhóm</label>
			<select class="form-control" name="kyhoc_ten2">
        <option selected disabled>Chọn nhóm</option>
        <option value="Nhóm 1">Nhóm 1</option>
        <option value="Nhóm 2">Nhóm 2</option>
        <option value="Nhóm 3">Nhóm 3</option>
      </select>
		</div>
    <div class="input-group">
			<label>Năm học</label>
			<select class="form-control" name="namhoc_ten">
        <option selected disabled>Chọn năm học</option>
        <?php
        for ($i=0; $i < count($namhoc['data']); $i++) {
          ?>
          <option value="<?php echo $namhoc['data'][$i]['namhoc_ten'] ?>"><?php echo $namhoc['data'][$i]['namhoc_ten'] ?></option>
        <?php } ?>
      </select>
		</div>
    <button type="submit" name="addKyhoc" class="btn btn-primary">Add</button>
    <button type="button" class="btn btn-danger" onclick="closeFormAddKy()">Close</button>
  </form>
</div>


<script>
function openFormAddKy() {
  document.getElementById("AddFormKy").style.display = "block";
}

function closeFormAddKy() {
  document.getElementById("AddFormKy").style.display = "none";
}
</script>
