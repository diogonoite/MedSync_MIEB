<html>
<link rel="stylesheet" type="text/css" href="./css/reabilitacao.css">


<div class="wrap_lista_remover_videos">

<?php
// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

    $lista_videos = "SELECT * FROM videos_rehab ORDER BY id_video DESC";
$result_lista_videos = mysqli_query ($link ,$lista_videos)
or die('The query failed: ' . mysqli_error($link));

?>


<form action="" method="post"> 
<input class="pesquisar_video" type="text" name="procurar_video" placeholder="Título do vídeo..."/> 
<input class="pesquisar_video_submeter" type="submit" value="Pesquisar"/>
</form>



<table id="table">
<thead>
<tr class="head">
    <th>Título</th>
    <th>Ficheiro</th>
    <th>Data</th>
    <th>Vídeo</th>
    <th></th>
</tr>
</thead>
<tbody>

<?php

if (empty($_REQUEST['procurar_video'])) {

if($result_lista_videos!=0){
    while($row_videos =mysqli_fetch_assoc($result_lista_videos)){

echo '<tr class="dados_lista">
        <td>'.$row_videos['titulo'].'</td>
        <td>'.$row_videos['nome_ficheiro'].'</td>
        <td>'.$data_nova=date("d/m/Y",strtotime($row_videos['data_video'])).'</td>
        <td><video width="150" controls> <source src="videos/'.$row_videos['nome_ficheiro'].'" type="video/webm"></video></td>
        <td class="excluir"><a href="dashboard.php?operacao=reabilitacao&sub=removerexercicio&act='.$row_videos['id_video'].'" onclick="return confirm(\'Tem a certeza que deseja eliminar o exercício selecionado?\')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>';
    }
    if($_GET['act']==true){
        $eliminar_video_query = 'DELETE FROM videos_rehab WHERE id_video="'.$_GET['act'].'"';
        $result_elimin_lista_videos = mysqli_query ($link ,$eliminar_video_query)
        or die('The query failed: ' . mysqli_error($link));


        echo "<script>window.location.href='dashboard.php?operacao=reabilitacao&sub=removerexercicio';</script>";
    exit;
    }
    
}else{
    echo "Não foram encontrados utilizadores";
}


echo '

</tbody>
</table>';


 

}else{ // procura de utilizadores php

    $titulo_video_inserido=$_REQUEST['procurar_video'];
    
    $pesquisa_video_query = 'SELECT * FROM videos_rehab WHERE titulo LIKE "%'.$titulo_video_inserido.'%" ORDER BY id_video DESC';
    $pesquisa_video= mysqli_query($link ,$pesquisa_video_query)
    or die('The query failed: ' . mysqli_error($link));

    if($pesquisa_video!=0){
        while($pesquisar_video =mysqli_fetch_assoc($pesquisa_video)){
    
    echo '<tr class="dados_lista">
            <td>'.$pesquisar_video['titulo'].'</td>
            <td>'.$pesquisar_video['nome_ficheiro'].'</td>
            <td>'.$data_nova=date("d/m/Y",strtotime($pesquisar_video['data_video'])).'</td>
            <td><video width="150" controls> <source src="videos/'.$pesquisar_video['nome_ficheiro'].'" type="video/webm"></video></td>
            <td class="excluir"><a href="dashboard.php?operacao=reabilitacao&sub=removerexercicio&act='.$pesquisar_video['id_video'].'" onclick="return confirm(\'Tem a certeza que deseja eliminar o exercício selecionado?\')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>';
    
        }
    
    }else{
        echo "";// falta colocar mensagem caso nao encontre utilizadores.... melhorar
    }
    
    echo '
    
    </tbody>
    </table>';
        
}

?>
</div>
</html>