<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<?php
 
if(isset($_POST['confirmar_nova_entrada'])==true){
    $id_perfil=$_GET['id'];

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $nr_comentario_query = "select max(nr_comentario_principal) from comentario_principal where id=$id_perfil";
    $nr_comentario_result = mysqli_query($link,$nr_comentario_query);
    $nr_comentario_max = mysqli_fetch_row($nr_comentario_result);
    $nr_comentario_atual = $nr_comentario_max[0]+1;
    
    date_default_timezone_set('Europe/Lisbon');
    $data = date('Y/m/d', time());
    $hora = date('H:i:s', time());
    
    
    $inserir_comentario_resumo = 'INSERT INTO `comentario_principal`(`id`,`nr_comentario_principal`, `data_comentario`, `hora_comentario`, `comentario_principal`) VALUES ("'.$id_perfil.'","'.$nr_comentario_atual.'","'.$data.'","'.$hora.'","'.$_POST['comentario_textarea'].'")';
$result_comentario_resumo = mysqli_query ($link ,$inserir_comentario_resumo)
or die('The query failed: ' . mysqli_error($link));

header('location:dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=resumo');

}

?>

<div class="resumo">
<div class="resumo_header">
<h2>Adicionar nova entrada ao resumo <i style="color:white;"class="fa fa-chevron-circle-down" aria-hidden="true"></i></h2>
</div>
<form method="POST" action="#">

<textarea class="nota_textarea" name="comentario_textarea" placeholder="Adicionar comentário..." ></textarea>
<button type="input" class="confirmar_nota" name="confirmar_nova_entrada" onclick="return confirm('Deseja submeter o novo registo?')"><i class="fa fa-plus-square" aria-hidden="true"></i> Inserir entrada</button>
</form>

</div>

</html>