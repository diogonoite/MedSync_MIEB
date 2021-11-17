<html>

<link rel="stylesheet" type="text/css" href="./css/reabilitacao.css">
<div class="titulo_adicionar_ex">
<h1>Título do vídeo (ex: Ombro-1)  <i class="fa fa-arrow-down" aria-hidden="true"></i></h1>
    <form method="POST" enctype="multipart/form-data">
    <div class="div_introduzir_video">
    <input class="nome_video" type="text" name="titulo_video">
    <input class="select_video" type="file" name="file" >
    </div>
    <div class="div_registar_video">
    <input type="submit" name="registar_video" value="Registar vídeo" onclick="return confirm('Deseja adicionar o ficheiro à base de dados?')">&nbsp;
</div>
    <?php

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');


if(isset($_POST['registar_video']))
{    
 $titulo = $_POST['titulo_video'];
 $video_name = $_FILES['file']['name'];
 $video_loc =  $_FILES['file']['tmp_name'];
 $video_size = $_FILES['file']['size'];
 $video_type = $_FILES['file']['type'];
 $video_folder="videos/";

if($_POST['titulo_video']==true && is_uploaded_file($_FILES['file']['tmp_name'])){
 move_uploaded_file($video_loc,$video_folder.$video_name);

 date_default_timezone_set('Europe/Lisbon');
 $data = date('Y/m/d', time());
 
 $upload_doc="INSERT INTO videos_rehab(nome_ficheiro,extensao,titulo,data_video) VALUES('$video_name','$video_type','$titulo','$data')";
 $result_upload = mysqli_query ($link ,$upload_doc)
 or die('The query failed: ' . mysqli_error($link)); 
    header('Location:dashboard.php?operacao=reabilitacao&sub=confirmacao_upload_exercicio');
}else{
    header('Location:dashboard.php?operacao=reabilitacao&sub=erro_upload_exercicio');
  }
}
?>
    </form>


    </html>