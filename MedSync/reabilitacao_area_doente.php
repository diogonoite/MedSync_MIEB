<html>
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">

<div class="info"> 
    
        <p class="dshb">Reabilitação motora - Última prescrição</p>

</div>

<div class="info_prescr_anteriores"> 

<button onclick="window.location.href='dashboard_doente.php?operacao=reabilitacao_doente_anteriores'"><i class="fa fa-tasks" aria-hidden="true"></i> Prescrições anteriores</button>
    
</div>


<div class="prescricoes_utente">

<?php

include('connection_db.php');


$query2 = 'SELECT max(nr_prescricao) FROM prescricao WHERE id_perfil="'.$_SESSION['utilizador'].'"';
$max_prescricao_result = mysqli_query ($link ,$query2) or die('The query failed: ' . mysqli_error($link));
$max_prescricao= mysqli_fetch_row($max_prescricao_result);

$query3 = 'SELECT * FROM prescricao WHERE id_perfil="'.$_SESSION['utilizador'].'" AND nr_prescricao="'.$max_prescricao[0].'"';
$query3_result = mysqli_query ($link ,$query3) or die('The query failed: ' . mysqli_error($link));

?>


<div>

<?php
echo '<div class="wrap_ultima_prescricao">';
while($result1 = mysqli_fetch_assoc($query3_result)){
$data_formato_novo = date("d-m-Y", strtotime($result1['data_prescricao']));
echo' 

   <div class="ultima_prescricao">

   <div class="texto_ultima_prescricao"><p>Exercício - '.$result1['titulo'].'</p>
   </div>
   <div class="videos_ultima_prescricao">
   <video width="500" controls> <source src="videos/'.$result1['nome_ficheiro'].'" type="video/webm"></video>
   </div>
   <div class="comentario_ultima_prescricao"><p>Indicações <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i> '.$result1['comentario_video'].'</p>
   </div>

    </div>';

}
echo'</div>';
?>

</div>
</div>
</html>