<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<div class="botoes_reab_doente_wrap">
<div class="botoes_reab_doente">

<?php
$id_perfil=$_GET['id'];
?>

<div class="icone_prescrever">
<a href="dashboard.php?operacao=utentes&id=<?php echo $id_perfil;?>&sub=prescrever_doente"> <img class="icone_reab_perfil" src="./img/prescrever.png"></a>
</div>
<div class="icone_prescricoes">
<a href="dashboard.php?operacao=utentes&id=<?php echo $id_perfil;?>&sub=prescricoes_doente"> <img class="icone_reab_perfil" src="./img/registos_reab.png"></a>
</div>
<div class="icone_rand">
<a href="dashboard.php?operacao=utentes&id=<?php echo $id_perfil;?>&sub=feedbackutente"> <img class="icone_reab_perfil" src="./img/feedback.png"></a>
</div>

</div>
</div>

<div class="reab_doente_baixo">


</div>
</hmtl>