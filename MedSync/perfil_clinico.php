<html>
<link rel="stylesheet" type="text/css" href="./css/users.css">
<div class="info"> 
        <p class="dshb">Perfil do clínico,</p>
</div>

<link rel="stylesheet" type="text/css" href="./css/area_doente.css">
<?php  $utilizador=$_SESSION['utilizador'];

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($links));

include('connection_db.php');

$sql_query = "select * from admins where utilizador='$utilizador'";
$dados = mysqli_query($link,$sql_query);
$dados_clinico = mysqli_fetch_assoc($dados);


?>

<div class="dados_doente">

<div class="sec_1_doente">
<?php 
if($dados_clinico['sexo']=='F'){
    echo'<img class="avatar_doente" src="./img/doente_mulher.png">';
}elseif($dados_clinico['sexo']=='M'){
    echo'<img class="avatar_doente" src="./img/doente_homem.png">';
}else{
    echo'<img class="avatar_doente" src="./img/doente_outro.png">';
}

?>
<div class="area_botoes_dados_doente">
    <div class="botoes_perf_doente">
    <button onclick="window.location.href='dashboard.php?operacao=perfil_clinico&sub=editar_perfil'" class="botao_1" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Atualizar perfil</button>
    </div>
</div>
</div>

<div class="info_dados_doente">
<h3>Nome do clínico,</h3>
<p><?php echo $dados_clinico['nome'];?></p>
</div>
<div class="info_dados_doente_2">

<div class="info_dados_doente_2_bloco1">
<p><b>Utilizador: </b><?php echo $dados_clinico['utilizador'];?></p>
</div>

<div class="info_dados_doente_2_bloco2">
<p><b>Profissão: </b><?php echo $dados_clinico['profissao'];?></p>
</div>

<div class="info_dados_doente_2_bloco3">
<p><b>Contacto: </b><?php echo $dados_clinico['contacto'];?></p>
</div>

</div>
</div>


<div class="switch_perfil_doente">
<?php if (isset($_GET['sub'])==true){
        switch($_GET['sub']){
            case 'alterar_password':
                include('alterar_password_area_clinico.php');
            break;
            case 'editar_perfil':
                include('editar_perfil_area_clinico.php');
            break;
           
            default : include('alterar_password_area_clinico.php');
        }
    }
        else{
            include('alterar_password_area_clinico.php');
        }
        ?>
</div>


</html>