<?php

//import.php

include '../../vendor/autoload.php';

$conn = new PDO("mysql:host=localhost;dbname=dangkythitlu", "root", "");

if($_FILES["import_excel"]["name"] != '')
{
 $allowed_extension = array('xls', 'csv', 'xlsx');
 $file_array = explode(".", $_FILES["import_excel"]["name"]);
 $file_extension = end($file_array);

 if(in_array($file_extension, $allowed_extension))
 {
  $file_name = time() . '.' . $file_extension;
  move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
  $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
  $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

  $spreadsheet = $reader->load($file_name);

  unlink($file_name);

  $data = $spreadsheet->getActiveSheet()->toArray();

  foreach($data as $row)
  {
   $insert_data = array(
    ':monhoc_ma'  => $row[0],
    ':monhoc_ten'  => $row[1],
    if ($row[2]=="" or $row[2]==null) {
      ':bomon_ma' => '';
    }
    else {
      ':bomon_ma'  => $row[2],
    }

  );

   $query = 'INSERT INTO tb_monhoc
   (monhoc_ma, monhoc_ten, bomon_ma)
   VALUES (:monhoc_ma, :monhoc_ten, :bomon_ma)
   ON DUPLICATE KEY UPDATE
   monhoc_ten     = VALUES(monhoc_ten),
   bomon_ma     = VALUES(bomon_ma)';


   $statement = $conn->prepare($query);
   $statement->execute($insert_data);
  }
  $message = '<div class="alert alert-success">Data Imported Successfully</div>';

 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>
