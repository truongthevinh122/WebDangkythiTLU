
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

  <form method="post" action="/api.dangkythi/control/kieuthi/add.php" enctype="multipart/form-data" class="form-container">
    <div class="input-group">
			<label>Tên kiểu thi</label>
			<input type="text" name="kieuthi_ten" value="" required>
		</div>
    <div class="input-group">
			<label>Mô tả</label>
			<input type="text" name="kieuthi_mota" value="" >
		</div>
    <div class="input-group">
			<label>Hình thức thi</label>
      <select class="form-control" name="kieuthi_hinhthuc" required>
        <option disabled>Chọn hình thức</option>
        <option value="90">90 phút</option>
        <option value="180">180 phút</option>

      </select>
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
