<html>
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">
<?php  $utilizador=$_SESSION['utilizador'];

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($links));

include('connection_db.php');

$sql_query = 'select * from utentes where id_utente="'.$_SESSION['utilizador'].'"';
$dados = mysqli_query($link,$sql_query);
$dados_doente = mysqli_fetch_assoc($dados);


?>

<div class="perf_doente">    
<p class="perf_doente_text">Perfil do utente</p>
</div>

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
<div class="area_botoes_dados_doente">
    <div class="botoes_perf_doente">
    <button onclick="window.location.href='dashboard_doente.php?operacao=perfil_doente&sub=editar_perfil'" class="botao_1" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Atualizar perfil</button>
    </div>
</div>
</div>

<div class="info_dados_doente">
<h2>Nome do utente:</h2>
<p><?php echo $dados_doente['nome'];?></p>
</div>
<div class="info_dados_doente_2">

<div class="info_dados_doente_2_bloco1">
<p><b>ID: </b><?php echo $dados_doente['id_utente'];?></p>
<p><b>Data de nascimento: </b><?php echo date("d/m/Y",strtotime($dados_doente['data_nascimento']));?></p>
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
<?php if (isset($_GET['sub'])==true){
        switch($_GET['sub']){
            case 'alterar_password':
                include('alterar_password_area_doente.php');
            break;
            case 'editar_perfil':
                include('editar_perfil_area_doente.php');
            break;
           
            default : include('alterar_password_area_doente.php');
        }
    }
        else{
            include('alterar_password_area_doente.php');
        }
        ?>
</div>

</html>