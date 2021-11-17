<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="./css/perfill.css">
<div class="prescrever_wrap">

<?php
// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');


    $lista_videos = "SELECT * FROM videos_rehab ORDER BY id_video DESC";
$result_lista_videos = mysqli_query ($link ,$lista_videos)
or die('The query failed: ' . mysqli_error($link));

$id_perfil=$_GET['id'];

?>

<form method="POST">
<table id="table_videos_prescricao">
<thead>
<tr class="head">
    <th>Título</th>
    <th>Data</th>
    <th>Vídeo</th>
    <th>Nota</th>
    <th></th>
</tr>
</thead>

<tbody>

<?php


if($result_lista_videos!=0){
    while($row_videos =mysqli_fetch_assoc($result_lista_videos)){

echo '<tr class="dados_lista">
        <td>'.$row_videos['titulo'].'<input type="hidden" name="titulo_presc[]" value="'.$row_videos['id_video'].'"></td>
        <td>'.$data_nova=date("d/m/Y",strtotime($row_videos['data_video'])).'</td>
        <td><video width="150" controls> <source src="videos/'.$row_videos['nome_ficheiro'].'" type="video/webm"></video></td>
        <td><input type="text" class="input_texto_prescricao" name="comentario_video[]"></td>
        <td><input type="checkbox" class="input_check_prescricao" name="prescricao[]" value="'.$row_videos['id_video'].'"></td>
        
</tr>';
    }   
}else{
    echo "Não foram encontrados videos";
}


echo '

</tbody>
<input type="submit" name="submit_prescricao" class="botao_submeter_prescricao" value="Submeter prescrição" onclick="return confirm(\'Tem a certeza que deseja submeter esta prescrição?\')"/>
</table>
</form>';


if(isset($_POST["submit_prescricao"])){

    $prescricao_query = "select max(nr_prescricao) from prescricao where id_perfil=$id_perfil";
    $prescricao_result = mysqli_query($link,$prescricao_query);
    $nr_prescricao_anterior = mysqli_fetch_row($prescricao_result);
    $nr_prescricao = $nr_prescricao_anterior[0]+1;
    date_default_timezone_set('Europe/Lisbon');
    $data = date('Y/m/d', time());
    $hora = date('H:i:s', time());
    $clinico= $_SESSION['utilizador'];

    $checked_array=$_POST['prescricao'];

        foreach($_POST['titulo_presc'] as $prescrever => $value){
            
            if(in_array($_POST['titulo_presc'][$prescrever], $checked_array)){

                $id_video_inserir = $_POST['titulo_presc'][$prescrever];
                $comentario_video_inserir = $_POST['comentario_video'][$prescrever];

                $query_pr = "SELECT * FROM videos_rehab WHERE id_video=".$_POST['titulo_presc'][$prescrever]."";
                $result_pr = mysqli_query ($link ,$query_pr)
                or die('The query failed: ' . mysqli_error($link));
                $dados_videos_prescrever= mysqli_fetch_assoc($result_pr);
                $titulo_video_inserir = $dados_videos_prescrever['titulo'];
                $nome_video_inserir = $dados_videos_prescrever['nome_ficheiro'];


                $prescricao_query = "INSERT INTO `prescricao` (`nr_prescricao`,`id_video`,`comentario_video`,`id_perfil`,`data_prescricao`,`hora_prescricao`,`clinico_prescricao`,`titulo`,`nome_ficheiro`) VALUES ('$nr_prescricao','$id_video_inserir','$comentario_video_inserir','$id_perfil','$data','$hora','$clinico','$titulo_video_inserir','$nome_video_inserir')";
                mysqli_query($link,$prescricao_query);


        echo '<script>window.location.href="dashboard.php?operacao=utentes&id='.$_GET['id'].'&sub=prescricoes_doente";</script>';
            }
                
           
        }
    }


?>

</div>
</html>