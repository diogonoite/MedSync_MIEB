<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<div class="upload">
<div class="upload_header">

<h2>Documentos anexados</h2>

<form  method="POST" enctype="multipart/form-data">
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

 //$file_explode = explode('.',$_FILES['file']['name']);
 //$file_name = ucwords(preg_replace("!-!"," ",$file_explode[0]));
 //$file_name = $file_explode[0];
 $file_name = $_FILES['file']['name'];
 $file_loc =  $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploaded_files/";

 $nr_upload_query = "SELECT max(numero) FROM docs_upload WHERE id_utente=$id_utente";
 $nr_upload_query_result = mysqli_query($link,$nr_upload_query);
 $nr_upload_max= mysqli_fetch_row($nr_upload_query_result);
 $nr_upload=$nr_upload_max[0]+1;

    date_default_timezone_set('Europe/Lisbon');
    $data = date('Y/m/d', time());
    $hora = date('H:i:s', time());

 move_uploaded_file($file_loc,$folder.$file_name);
 $upload_docs="INSERT INTO docs_upload(id_utente,nome,tipo,numero,data_upload,hora) VALUES('$id_utente','$file_name','$file_type','$nr_upload','$data','$hora')";
 $result_upload = mysqli_query ($link ,$upload_docs)
 or die('The query failed: ' . mysqli_error($link));
}
?>
</div>
<table class="lista_documentos_upload" cellspacing="0">
<thead>
    <tr class="head_upload_table">
    <th></th>
    <th>Nome do ficheiro</th>
    <th>Formato</th>
    <th>Data</th>
    <th>Hora</th>
    <th></th>
    </tr>
</thead>
<tbody>
    <?php
 $procurar_docs_query="SELECT * FROM docs_upload WHERE id_utente=$id_utente ORDER BY numero DESC";
 $procurar_docs_result=mysqli_query($link,$procurar_docs_query);
 while($documentos_upload=mysqli_fetch_assoc($procurar_docs_result))
 {
  ?>
      
        <tr>
        <td><a href="uploaded_files/<?php echo $documentos_upload['nome'] ?>" target="_blank"><?php if($documentos_upload['tipo']=="image/png"){echo '<i class="fa fa-search-plus" aria-hidden="true"></i>
';}elseif($documentos_upload['tipo']=="image/jpeg"){echo '<i class="fa fa-search-plus" aria-hidden="true"></i>';}if($documentos_upload['tipo']=="image/jpg"){echo '<i class="fa fa-search-plus" aria-hidden="true"></i>';}elseif($documentos_upload['tipo']=="application/pdf"){echo '<i class="fa fa-search-plus" aria-hidden="true"></i>
';} ?></a></td>
        <td><?php $file_explode = explode('.',$documentos_upload['nome']); echo ucwords(preg_replace("!-!"," ",$file_explode[0])) ?></td>
        <td><?php if($documentos_upload['tipo']=="image/png"){echo '<i class="fa fa-file-image-o" aria-hidden="true"></i> Img';}elseif($documentos_upload['tipo']=="application/pdf"){echo '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Pdf';}elseif($documentos_upload['tipo']=="image/jpeg"){echo '<i class="fa fa-file-image-o" aria-hidden="true"></i> Img';}elseif($documentos_upload['tipo']=="image/jpg"){echo '<i class="fa fa-file-image-o" aria-hidden="true"></i> Img';} ?></td>
        <td><?php echo $documentos_upload['data_upload'] ?></td>
        <td><?php echo $documentos_upload['hora'] ?></td>
        <td><a href="dashboard.php?operacao=utentes&id=<?php echo $id_utente ?>&sub=docs&eliminar_doc=<?php echo $documentos_upload['numero'] ?>" onclick="return confirm('Tem a certeza que deseja eliminar o documento selecionado?')"><i class="fa fa-trash" aria-hidden="true" style="color:rgb(255, 61, 71); font-size:16px"></i></a></td>
        </tr>
        <?php
 }
 if($_GET['eliminar_doc']==true){
    $eliminar_doc_query = 'DELETE FROM docs_upload WHERE (id_utente="'.$_GET['id'].'" AND numero="'.$_GET['eliminar_doc'].'")';
    $result_elimin_doc = mysqli_query ($link ,$eliminar_doc_query)
    or die('The query failed: ' . mysqli_error($link));
    echo "<script>window.location.href='dashboard.php?operacao=utentes&id=".$_GET['id']."&sub=docs';</script>";
    exit;
 }
 ?>
 </tbody>
</table>



</div>
</html>

