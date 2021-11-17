<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">
<link rel="stylesheet" type="text/css" href="./css/users.css">
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">

<div class="perf_utente">
<p class="perf_text">Atualizar dados do perfil</p>
</div>
<?php  $utilizador=$_GET['id'];

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($links));

include('connection_db.php');

$sql_query = "select * from utentes where id_utente='$utilizador'";
$dados = mysqli_query($link,$sql_query);
$dados_doente = mysqli_fetch_assoc($dados);


?>

<div class="dados_doente">

<div class="sec_1_doente">
<?php 
if($dados_doente['sexo']=='F'){
    echo'<img class="avatar_doente" src="./img/doente_mulher.png">';
}elseif($dados_doente['sexo']=='M'){
    echo'<img class="avatar_doente" src="./img/doente_homem.png">';
}else{
    echo'<img class="avatar_doente" src="./img/doente_outro.png">';
}

?>

</div>

<div class="info_dados_doente">
<h2>Nome do utente,</h2>
<p><?php echo $dados_doente['nome'];?></p>
</div>
<div class="info_dados_doente_2">

<div class="info_dados_doente_2_bloco1">
<p><b>ID: </b><?php echo $utilizador;?></p>
<p><b>Data de nascimento: </b><?php echo date("d/m/Y",strtotime($dados_doente['data_nascimento']));?></p>
</div>

<div class="info_dados_doente_2_bloco2">
<p><b>Profissão: </b><?php echo $dados_doente['profissao'];?></p>
<p><b>Nacionalidade: </b><?php echo $dados_doente['nacionalidade'];?></p>
</div>

<div class="info_dados_doente_2_bloco3">
<p><b>Contacto: </b><?php echo $dados_doente['contacto'];?></p>
<p class="max_length_dados_perfil"><b>Morada: </b><?php echo $dados_doente['morada'];?></p>
</div>

</div>
</div>


<div class="switch_perfil_doente">
<?php 
include('editar_perfil_lista_utentes_form.php');
?>
</div>

</html>