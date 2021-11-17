<html>
<link rel="stylesheet" type="text/css" href="./css/utentess.css">
<link rel="stylesheet" type="text/css" href="./css/users.css">
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">

<div class="info"> 
        <p class="dshb">Atualizar perfil,</p>
</div>


<?php  $utilizador=$_SESSION['utilizador'];

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($links));

include('connection_db.php');

$sql_query = 'SELECT * FROM admins WHERE id="'.$_GET['id'].'"';
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
<h2>Nome do clinico,</h2>
<p><?php echo $dados_doente['nome'];?></p>
</div>
<div class="info_dados_doente_2">

<div class="info_dados_doente_2_bloco1">
<p><b>ID: </b><?php echo $dados_doente['id'];?></p>
</div>

<div class="info_dados_doente_2_bloco2">
<p><b>Utilizador: </b><?php echo $dados_doente['utilizador'];?></p>
</div>

<div class="info_dados_doente_2_bloco3">
<p><b>Profissao: </b><?php echo $dados_doente['profissao'];?></p>
</div>
<div class="info_dados_doente_2_bloco3">
<p><b>Contacto: </b><?php echo $dados_doente['contacto'];?></p>
</div>

</div>
</div>


<div class="switch_perfil_doente">
<?php 
    include('editar_perfil_lista_clinicos_form_admin.php');
?>
</div>

</html>