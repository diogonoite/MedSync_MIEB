<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<?php

if(isset($_GET['id'])){
    $id_perfil=$_GET['id'];
}

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($links));

include('connection_db.php');

$dados_query = "select * from utentes where id_utente=$id_perfil";
$total_result = mysqli_query($link,$dados_query);
$dados = mysqli_fetch_assoc($total_result);

$evolucao_query = "select score from avaliacao_barthel where id_barthel=$id_perfil order by nr_aval asc";
$evolucao_result = mysqli_query($link,$evolucao_query);
$tamanho_vetor_score = mysqli_num_rows($evolucao_result);
date_default_timezone_set('Europe/Lisbon');
$data_atual = date('Y/m/d', time());

while($row = mysqli_fetch_assoc($evolucao_result)){
    $score[] = $row['score'];
}


$percentagem_evolucao = (($score[$tamanho_vetor_score-1]-$score[0]));

?>

<?php if($_GET['sub']!="avaliar" && $_GET['sub']!="feedbackutente" && $_GET['sub']!="reab_doente" && $_GET['sub']!="prescrever_doente" && $_GET['sub']!="prescricoes_doente"){

echo '<div class="perf_utente">    
<p class="perf_text">Perfil do utente</p>
</div>';
}else if($_GET['sub']=="reab_doente"){
    echo '<div class="perf_utente">    
<p class="perf_text">Reabilitação funcional</p>
</div>';}
else if($_GET['sub']=="prescrever_doente"){
    echo '<div class="perf_utente">    
<p class="perf_text">Reabilitação funcional - prescrição</p>
</div>';}
else if($_GET['sub']=="prescricoes_doente"){
    echo '<div class="perf_utente">    
<p class="perf_text">Reabilitação funcional - prescrições anteriores</p>
</div>';}
else if($_GET['sub']=="avaliar"&&$_GET['graf']==false){
    echo '<div class="perf_utente">    
<p class="perf_text">Avaliação funcional (índice de Barthel)</p>
</div>';}
else if($_GET['graf']=="1"){
    echo '<div class="perf_utente">    
    <p class="perf_text">Evolução total da reabilitação funcional (índice de Barthel)</p>
    </div>';}
    else if($_GET['graf']=="supl"){
        echo '<div class="perf_utente">    
        <p class="perf_text">Evolução funcional por parâmetros</p>
        </div>';}
        else if($_GET['graf']=="consultar"){
            echo '<div class="perf_utente">    
            <p class="perf_text">Avaliações funcionais anteriores</p>
            </div>';}

?>
    <div class="bloco_meio">
    <div class="informacao_perfil">
    <img class="cara_perfil" src="./img/outras.png">
    <p><b>ID:</b> <?php echo $dados['id_utente'];?></p>
    <p><b>Nome: </b><?php echo $dados['nome'];?> </p>
    <p><b>Idade:</b> <?php 
    $dif_datas=abs(strtotime($data_atual)-strtotime($dados['data_nascimento']));
    $anos=floor($dif_datas)/(365*60*60*24);
    echo floor($anos); echo ' anos';
    ?></p>
    <p><b>Nacionalidade:</b> <?php echo $dados['nacionalidade'] ;?></p>
    <p><b>Contacto:</b> <?php echo $dados['contacto'] ;?></p>
   

    <?php if($_GET['sub']=="avaliar"&&$_GET['graf']==false){
    echo '<div>
    <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=avaliar&graf=1"> <img class="grafico_aval" src="./img/chart_icone.png"></a>

    </div>';}elseif($_GET['sub']=="avaliar"&&$_GET['graf']=="supl"){
    echo ' 
    
    
    <div class="opcoes_grafico">
    <div class="opcoes_1">
    <form action="#" method="post">
    <p>
        <input type="checkbox" class="checkbox"  id="kolom1" checked> Alimentação
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom2" checked> Banho
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom3" checked> Ativ. rotineiras
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom4" checked> Vestir-se
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom5" checked> Intestino
    </p>
    </div>
    <div class="opcoes_2">
    <p>
        <input type="checkbox" class="checkbox"  id="kolom6" checked> S. urinário
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom7" checked> Uso de WC
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom8" checked> Transferência
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom9" checked> Mobilidade
    </p>
    <p>
        <input type="checkbox" class="checkbox"  id="kolom10" checked> Escadas
    </p>
    </div>
    <p>
        <input type="submit" class="botao_especificos" value="Reset" />
    </p>

    </div>
</form>';}elseif($_GET['sub']=="avaliar"&&$_GET['graf']=="consultar"){
    echo'
    <div>
    <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=avaliar&graf=1"> <img class="grafico_aval_extra" src="./img/chart_icone.png"></a>
    </div>
    <div class="outros_graf_extra">
    <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=avaliar&graf=supl"><button>Evolução por parâmetros &nbsp;<i class="fa fa-line-chart" style="color:black; font-size:40px; vertical-align:middle;"></i></button></a>
    </div>
    ';}elseif($_GET['sub']=="prescrever_doente"){
        echo'
        <div>
        <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=feedbackutente"> <img class="grafico_aval_extra" src="./img/feedback.png"></a>
        </div>
        <div class="outros_graf_extra">
        <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=prescricoes_doente"><button>Prescrições anteriores <i class="fa fa-book" style="color:black; font-size:40px; vertical-align:middle;"></i></button></a>
        </div>
        ';}
    
    
    
    
    
    
    elseif($_GET['sub']=="avaliar"&&$_GET['graf']==1){
    echo '<div class="percentagem_evolucao">
    <a>'.ceil($percentagem_evolucao).'% ';if($percentagem_evolucao>0){echo'<i class="fa fa-arrow-circle-up" style="color:green;"></i></a>';}
    elseif($percentagem_evolucao<0){echo '<i class="fa fa-arrow-circle-down" style="color:red;"></i></a>';}elseif($percentagem_evolucao==0){
        echo'<i class="fa fa-arrows-h" style="color:white;"></i></a>';
    }

    
    echo '</div>
   
    <div class="consulta_avaliacao">
    <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=avaliar&graf=consultar"><button>Consultar avaliações &nbsp;<i class="fa fa-folder-open" style="color:black; font-size:40px; vertical-align:middle;"></i></button></a>
    </div>
    <div class="outros_graf">
    <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=avaliar&graf=supl"><button>Evolução por parâmetros &nbsp;<i class="fa fa-line-chart" style="color:black; font-size:40px; vertical-align:middle;"></i></button></a>
    </div>';}
?>
    </div>



<?php
if($_GET['sub']!="avaliar"&&$_GET['sub']!="reab_doente"&&$_GET['sub']!="feedbackutente"&&$_GET['sub']!="prescrever_doente"&&$_GET['sub']!="prescricoes_doente"){
   
    if($_GET['graf']!="supl"&&$_GET['sub']!="reab_doente"){
    echo'<div class="botoes_perfil_wrap">
        <div class="botoes_perfil">

        <div class="resumo_saude">
        <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=resumo"> <img class="icone_perfil" src="./img/agenda.png"></a>
        </div>';
        echo'<div class="perfil_docs">
        <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=docs"> <img class="icone_perfil" src="./img/consultas.png"></a>
        </div>';
        echo'<div class="perfil_dados">
        <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=dados"> <img class="icone_perfil" src="./img/dados.png"></a>
        </div>';
        echo '<div class="avaliacao_botao">
        <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=avaliar"> <img class="icone_perfil" src="./img/avaliacao.png"></a>
        </div>';
        echo'<div class="avaliacao_botao">
        <a href="dashboard.php?operacao=utentes&id='.$id_perfil.'&sub=reab_doente"> <img class="icone_perfil" src="./img/rehab_utente.png"></a>
        </div>
        
    </div>
    </div>';
}


echo'</div>';
if (isset($_GET['graf'])!="supl"){
echo '<div class="baixo_caixa">';


if (isset($_GET['sub'])==true){
        switch($_GET['sub']){
            case 'resumo':
                include('resumo_perfil.php');
            break;
            case 'adicionar_resumo':
                include('adicionar_resumo.php');
            break;
            case 'docs':
                include('docs_perfil.php');
            break;
            case 'upload_resumo':
                include('upload_resumo.php');
            break;
            case 'dados':
                include('dados_perfil.php');
            break;
            case 'score':
                include('score.php');
            break;
            case 'comentario':
                include('comentario.php');
            break;
        }
    }
        else{
            include('resumo_perfil.php');
        }

echo'</div>';
    }
} elseif(isset($_GET['graf'])==true){
        switch($_GET['graf']){
            case '1':
                include('grafico_barthel.php');
            break;
            case 'supl':
                include('grafico_barthel_especifico.php');
            break;
            case 'consultar':
                include('avaliacoes.php');
            break;
        }
    }elseif(isset($_GET['sub'])==true){
        switch($_GET['sub']){
            case 'avaliar':
                include('avaliar_perfil.php');
            break;
            case 'reab_doente':
            include('main_reabilitacao_pres.php');
            break;
            case 'prescrever_doente':
                include('prescrever_doente.php');
            break;
            case 'prescricoes_doente':
                include('prescricoes_doente.php');
            break;
            case 'feedbackutente':
                include('feedback.php');
            break;
            
        }
    }



?>
</html>