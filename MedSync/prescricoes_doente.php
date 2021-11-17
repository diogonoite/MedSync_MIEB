<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<div class="wrap_prescricoes_antigas">



<?php

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

$query2 = "SELECT max(nr_prescricao) FROM prescricao WHERE id_perfil=".$_GET['id']."";
$max_prescricao_result = mysqli_query ($link ,$query2) or die('The query failed: ' . mysqli_error($link));
$max_prescricao= mysqli_fetch_row($max_prescricao_result);

for($i = $max_prescricao[0]; $i>0; $i--)
{
$query3 = "SELECT data_prescricao FROM prescricao WHERE id_perfil=".$_GET['id']." AND nr_prescricao=".$i." ";
$data_prescricao_result = mysqli_query ($link ,$query3) or die('The query failed: ' . mysqli_error($link));
$data_prescricao= mysqli_fetch_row($data_prescricao_result);

$data_formato_novo0 = date("d-m-Y", strtotime($data_prescricao[0]));

$query = "SELECT * FROM prescricao WHERE id_perfil=".$_GET['id']." AND nr_prescricao=".$i." ORDER BY nr_prescricao ASC";
$result_videos = mysqli_query ($link ,$query) or die('The query failed: ' . mysqli_error($link));
echo'<p class="teste_presc"> Prescrição '.$i.' <i class="fa fa-arrow-down" aria-hidden="true"></i> ('.$data_formato_novo0.')</p>';
echo'
<table id="table2">
<thead>
<tr class="head">
    <th>Título</th>
    <th>Ficheiro</th>
    <th>Vídeo</th>
    <th>Nota</th>
    <th>Clínico</th>
    <th></th>
</tr>
</thead>
<tbody>';
while($result= mysqli_fetch_assoc($result_videos)){
$data_formato_novo = date("d-m-Y", strtotime($result['data_prescricao']));
    echo '  
   <tr class="dados_lista">
   <td>'.$result['titulo'].'</td>
   <td>'.$result['nome_ficheiro'].'</td>
   <td><video width="150" controls> <source src="videos/'.$result['nome_ficheiro'].'" type="video/webm"></video></td>
   <td><a class="nota_prescr" href="dashboard.php?operacao=utentes&id='.$_GET['id'].'&sub=prescricoes_doente&presc='.$result['nr_prescricao'].'&video='.$result['id_video'].'"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
   <td>'.$result['clinico_prescricao'].'</td>
   <td><a class="eliminar_prescr" href="dashboard.php?operacao=utentes&id='.$_GET['id'].'&sub=prescricoes_doente&prescricao='.$result['nr_prescricao'].'&remover='.$result['id_video'].'"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>';
}

echo'</tbody>
</table>';
}
if($_GET['remover']==true){
    $eliminar_prescr_query = 'DELETE FROM prescricao WHERE id_video="'.$_GET['remover'].'" AND nr_prescricao="'.$_GET['prescricao'].'"';
    mysqli_query ($link ,$eliminar_prescr_query)
    or die('The query failed: ' . mysqli_error($link));


    echo '<script>window.location.href="dashboard.php?operacao=utentes&id='.$_GET['id'].'&sub=prescricoes_doente";</script>';
exit;
}
?>

</div>
<div class="amp_notas">
<?php
if(isset($_GET['presc'])){
$query3 = "SELECT * FROM prescricao WHERE id_perfil=".$_GET['id']." AND nr_prescricao=".$_GET['presc']." AND id_video=".$_GET['video']."";
$dados_amp_notas_result = mysqli_query ($link ,$query3) or die('The query failed: ' . mysqli_error($link));
$dados_amp_notas= mysqli_fetch_assoc($dados_amp_notas_result);
}
?>
<h3> Notas do exercício selecionado: </h3>
<?php

if(isset($_GET['presc'])){
    echo '<div class="bloco_notas"><p class="referencia_amp_notas">("'.$dados_amp_notas['titulo'].'", prescrição '.$dados_amp_notas['nr_prescricao'].')</p>';
    echo '<p class="corpo_texto_amp_notas">- '.$dados_amp_notas['comentario_video'].'</p></div>';
    echo '<form class="atualizar_nota" method="POST"> <input class="nota_atualizar" type="text" name="nova_nota_prescricao"> <input class="submeter_atualizar_nota" type="submit" name="atualizar_nota_prescricao" value="Atualizar">';

    if(isset($_POST['atualizar_nota_prescricao'])){

      $sql4 = 'UPDATE prescricao SET comentario_video="'.$_POST['nova_nota_prescricao'].'" WHERE id_video = "'.$_GET['video'].'" AND nr_prescricao="'.$_GET['presc'].'"';
      $result4 = mysqli_query ($link ,$sql4) or die('The query failed: ' . mysqli_error($link));
      
      echo '<script>window.location.href="dashboard.php?operacao=utentes&id='.$_GET['id'].'&sub=prescricoes_doente&presc='.$_GET['presc'].'&video='.$_GET['video'].'";</script>';
      exit;
    }

}

?>
</div>
</html>