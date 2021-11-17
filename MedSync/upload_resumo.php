<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">


<form  class="form_upload" method="POST" enctype="multipart/form-data">
<input type="file" name="file" >
<input type="submit" name="submit_upload" value="Upload">
</form>


<?php
// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

$id_utente=$_GET['id'];

if(isset($_POST['submit_upload']))
{    

 $file_explode = explode('.',$_FILES['file']['name']);
 $file_name = ucwords(preg_replace("!-!"," ",$file_explode[0]));
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploaded_files/";

 $nr_upload_query = "SELECT max(numero) FROM docs_upload WHERE id_utente=$id_utente";
 $nr_upload_query_result = mysqli_query($link,$nr_upload_query);
 $nr_upload_max= mysqli_fetch_row($nr_upload_query_result);
 $nr_upload=$nr_upload_max[0]+1;

 move_uploaded_file($file_loc,$folder.$file_name);
 $sql="INSERT INTO docs_upload(id_utente,nome,tipo,numero) VALUES('$id_utente','$file_name','$file_type','$nr_upload')";
 $result_sql = mysqli_query ($link ,$sql)
 or die('The query failed: ' . mysqli_error($link));
}
?>


</html>