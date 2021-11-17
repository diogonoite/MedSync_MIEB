<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">
<?php

if(isset($_GET['nr'])){
    $numero_avaliacao=$_GET['nr'];
}

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($links));

include('connection_db.php');

$extra_query = "SELECT * FROM avaliacao_barthel WHERE id_barthel=$id_perfil AND nr_aval=$numero_avaliacao";
$extra_result = mysqli_query($link,$extra_query);
$info_extra = mysqli_fetch_assoc($extra_result);

?>

<div class="resumo">
<h3>Avaliação nº <?php echo $info_extra['nr_aval'];?>, realizada em <?php echo $info_extra['data'];?></h3>
<div class="score1">
<p><b>Alimentação: </b><?php echo $info_extra[1]; 
if ($info_extra[1]==0){echo' (Incapacitado)';}else if($info_extra[1]==5){echo' (Precisa de ajuda)';}else if($info_extra[1]==10){echo' (Independente)';}?></p>
<p><b>Banho: </b><?php echo $info_extra[2]; if ($info_extra[2]==0){echo' (Dependente)';}else if($info_extra[2]==5){echo' (Independente)';}?></p>
<p><b>Atividades rotineiras: </b><?php echo $info_extra[3]; if ($info_extra[3]==0){echo' (Precisa de ajuda)';}else if($info_extra[3]==5){echo' (Independente)';}?></p>
<p><b>Vestir-se: </b><?php echo $info_extra[4];
if ($info_extra[4]==0){echo' (Dependente)';}else if($info_extra[4]==5){echo' (Precisa de ajuda)';}else if($info_extra[4]==10){echo' (Independente)';}?></p>
</div>
<div class="score2">
<p><b>Intestino: </b><?php echo $info_extra[5];
if ($info_extra[5]==0){echo' (Incontinente)';}else if($info_extra[5]==5){echo' (Acidente ocasional)';}else if($info_extra[5]==10){echo' (Funcional)';}?></p>
<p><b>S.Urinário: </b><?php echo $info_extra[6];
if ($info_extra[6]==0){echo' (Incontinente)';}else if($info_extra[6]==5){echo' (Acidente ocasional)';}else if($info_extra[6]==10){echo' (Funcional)';}?></p>
<p><b>Uso de WC: </b><?php echo $info_extra[7];
if ($info_extra[7]==0){echo' (Dependente)';}else if($info_extra[7]==5){echo' (Precisa de ajuda)';}else if($info_extra[7]==10){echo' (Independente)';}?></p>
<p><b>Transferência: </b><?php echo $info_extra[8];
if ($info_extra[8]==0){echo' (S/ equil. sentado)';}else if($info_extra[8]==5){echo' (Muita ajuda)';}else if($info_extra[8]==10){echo' (Pouca ajuda)';}
else if($info_extra[8]==15){echo' (Independente)';}?></p>
</div>
<div class="score3">
<p><b>Mobilidade: </b><?php echo $info_extra[9];
if ($info_extra[9]==0){echo' (Imóvel (ou <50m))';}else if($info_extra[9]==5){echo' (Cadeira de rodas)';}else if($info_extra[9]==10){echo' (Caminha c/ajuda)';}
else if($info_extra[9]==15){echo' (Independente)';}?></p>
<p><b>Escadas: </b><?php echo $info_extra[10];
if ($info_extra[10]==0){echo' (Incapacitado)';}else if($info_extra[10]==5){echo' (Precisa de ajuda)';}else if($info_extra[10]==10){echo' (Independente)';}?></p>
</div>
</html>