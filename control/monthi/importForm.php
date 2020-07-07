<style>
.form-popup {
display: none;
position: fixed;
bottom: 50%;
right: 30%;
border: 3px solid #f1f1f1;
z-index: 9;
}

.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

</style>
<div class="form-popup" id="ImportForm">

  <form method="post" id="import_excel_form" enctype="multipart/form-data" class="form-container">
    <table>
      <tr>
        <td><input type="file" name="import_excel" /></td>
        <td><input type="hidden" name="kyhoc" value="<?php echo $filterky ?>"/></td>
      </tr>
    </table>
    <input type="submit" name="import" id="import" class="btn btn-primary" value="Ok" />
    <button type="button" class="btn btn-danger" onclick="closeFormImport()">Close</button>
  </form>
</div>

<script>
$(document).ready(function(){
  $('#import_excel_form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"http://localhost:8235/api.dangkythi/control/monthi/import.php",
      method:"POST",
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      beforeSend:function(){
        $('#import').attr('disabled', 'disabled');
        $('#import').val('Importing...');
      },
      success:function(data)
      {
        $('#message').html(data);
        $('#import_excel_form')[0].reset();
        $('#import').attr('disabled', false);
        $('#import').val('Ok');
      }
    })
  });
});
</script>

<script>
function openFormImport() {
  document.getElementById("ImportForm").style.display = "block";
}

function closeFormImport() {
  document.getElementById("ImportForm").style.display = "none";
}
</script>
