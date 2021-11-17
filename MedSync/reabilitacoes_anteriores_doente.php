<html>
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">


<div class="info"> 
    
        <p class="dshb">Reabilitação motora - Prescrições anteriores</p>

</div>

<div class="wrap_prescricoes_anteriores">

<?php

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

$query2 = 'SELECT max(nr_prescricao) FROM prescricao WHERE id_perfil="'.$_SESSION['utilizador'].'"';
$max_prescricao_result = mysqli_query ($link ,$query2) or die('The query failed: ' . mysqli_error($link));
$max_prescricao= mysqli_fetch_row($max_prescricao_result);


for($i = $max_prescricao[0]; $i>0; $i-=1)
{
$query4 = 'SELECT data_prescricao FROM prescricao WHERE id_perfil="'.$_SESSION['utilizador'].'" AND nr_prescricao='.$i.' ';
$data_prescricao_result = mysqli_query ($link ,$query4) or die('The query failed: ' . mysqli_error($link));
$data_prescricao= mysqli_fetch_row($data_prescricao_result);

$data_formato_novo0 = date("d-m-Y", strtotime($data_prescricao['0']));

$query = 'SELECT * FROM prescricao WHERE id_perfil="'.$_SESSION['utilizador'].'" AND nr_prescricao='.$i.' ORDER BY nr_prescricao ASC';
$result_videos = mysqli_query ($link ,$query) or die('The query failed: ' . mysqli_error($link));
echo'<p class="teste_presc2"> Prescrição '.$i.' <i class="fa fa-arrow-down" aria-hidden="true"></i> ('.$data_formato_novo0.') </p>';
echo'
<table id="table3">
<thead>

</thead>
<tbody>';
while($result= mysqli_fetch_assoc($result_videos)){
$data_formato_novo = date("d-m-Y", strtotime($result['data_prescricao']));
    echo '  
   <tr class="dados_lista">
   <td>'.$result['titulo'].'</td>
   <td><video width="240" controls> <source src="videos/'.$result['nome_ficheiro'].'" type="video/webm"></video></td>
   <td><a>'.$result['comentario_video'].'</a></td>

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

</div>
</html>


</html>