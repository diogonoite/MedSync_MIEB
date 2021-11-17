<html>

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

<link rel="stylesheet" type="text/css" href="./css/perfill.css">
<div class="resumo">
<h2>Comentários da avaliação nº <?php echo $info_extra['nr_aval'];?>, realizada em <?php echo $info_extra['data'];?></h2>
<p class="comentario_barthel_txt"style="padding-top: 2%;"><b><?php echo $info_extra['comentario_barthel'];?></b></p>
</div>
</html>