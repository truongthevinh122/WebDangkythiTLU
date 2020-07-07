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

<div class="form-popup" id="AddFormCa">

  <form method="post" action="/api.dangkythi/control/cathi/add.php" enctype="multipart/form-data" class="form-container">
    <div class="input-group">
			<label>Tên ca thi</label>
			<input type="text" name="cathi_ten" value="" required>
		</div>
    <div class="input-group">
			<label>Giờ bắt đầu</label>
			<input type="time" name="batdau" value="" required>
		</div>
    <div class="input-group">
			<label>Giờ kết thúc</label>
			<input type="time" name="ketthuc" value="" required>
		</div>
    <button type="submit" name="addCathi" class="btn btn-primary">Add</button>
    <button type="button" class="btn btn-danger" onclick="closeFormAddCa()">Close</button>
  </form>
</div>


<script>
function openFormAddCa() {
  document.getElementById("AddFormCa").style.display = "block";
}

function closeFormAddCa() {
  document.getElementById("AddFormCa").style.display = "none";
}
</script>
