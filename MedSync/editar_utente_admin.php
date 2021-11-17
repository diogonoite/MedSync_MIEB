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

$sql_query = 'SELECT * FROM utentes WHERE id_utente="'.$_GET['id'].'"';
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
<p><b>ID: </b><?php echo $dados_doente['id_utente'];?></p>
<p><b>Data de nascimento: </b><?php echo date("d-m-Y", strtotime($dados_doente['data_nascimento']));?></p>
</div>

<div class="info_dados_doente_2_bloco2">
<p><b>Nacionalidade: </b><?php echo $dados_doente['nacionalidade'];?></p>
<p><b>Profissão: </b><?php echo $dados_doente['profissao'];?></p>
</div>

<div class="info_dados_doente_2_bloco3">
<p><b>Contacto: </b><?php echo $dados_doente['contacto'];?></p>
<p class="max_length_dados_perfil"><b>Morada: </b><?php echo $dados_doente['morada'];?></p>
</div>

</div>
</div>


<div class="switch_perfil_doente">
<?php 
    include('editar_perfil_lista_utentes_form_admin.php');
?>
</div>

</html>