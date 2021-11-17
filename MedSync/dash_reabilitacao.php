<html>
<link rel="stylesheet" type="text/css" href="./css/reabilitacao.css">

<div class="utentes_texto">
<?php
if ($_GET['sub']!=true) {

   echo '<p class="utentes_txt">Reabilitação funcional - home</p>
   </div>';}else if($_GET['sub']=="listavideos"){
   echo '<p class="utentes_txt">Reabilitação funcional - lista de exercícios</p>
   </div>';}else if($_GET['sub']=="prescrever"){
   echo '<p class="utentes_txt">Reabilitação funcional - prescrição de exercícios</p>
   </div>';}else if($_GET['sub']=="adicionarexercicio"){
   echo '<p class="utentes_txt">Reabilitação funcional - adicionar exercício</p>
   </div>';}
   else if($_GET['sub']=="confirmacao_upload_exercicio"){
    echo '<p class="utentes_txt">Reabilitação funcional - adicionar exercício</p>
    </div>';}
    else if($_GET['sub']=="erro_upload_exercicio"){
        echo '<p class="utentes_txt">Reabilitação funcional - adicionar exercício</p>
        </div>';}
   else if($_GET['sub']=="removerexercicio"){
    echo '<p class="utentes_txt">Reabilitação funcional - remover exercício</p>
    </div>';}

if ($_GET['sub']=="adicionarexercicio" || $_GET['sub']!=true || $_GET['sub']=="confirmacao_upload_exercicio" || $_GET['sub']=="erro_upload_exercicio") {

   echo '

<div class="lista_videos">

<div class="botoes_reabilitacao">

    <div class="lista_exercicios">
    <a href="dashboard.php?operacao=reabilitacao&sub=listavideos"> <img class="icones_reabilitacao_img" src="./img/icone_lista_exercicios.png"></a>
    </div>
    <div class="prescrever_exercicios">
    <a href="dashboard.php?operacao=utentes"> <img class="icones_reabilitacao_img" src="./img/icone_prescrever.png"></a>
    </div>
    <div class="adicionar_exercicios">
    <a href="dashboard.php?operacao=reabilitacao&sub=adicionarexercicio"> <img class="icones_reabilitacao_img" src="./img/icone_adicionar_exerc.png"></a>
    </div>
    <div class="remover_exercicios">
    <a href="dashboard.php?operacao=reabilitacao&sub=removerexercicio"> <img class="icones_reabilitacao_img" src="./img/icone_remover_exerc.png"></a>
    </div>
    
</div>'; 

echo'
<div class="caixa_baixo_reabilitacao">';

if ($_GET['sub']=="adicionarexercicio"){
            include('adicionar_exercicio.php');            
        }elseif($_GET['sub']=="confirmacao_upload_exercicio"){
            include('confirmacao_upload_exercicio.php');            
        }
        elseif($_GET['sub']=="erro_upload_exercicio"){
            include('erro_upload_exercicio.php');            
        }
echo'
</div>
</div>
';} else{
    if (isset($_GET['sub'])==true){
        switch($_GET['sub']){
            case 'listavideos':
                include('lista_videos.php');
            break;
            case 'removerexercicio':
                include('remover_exercicio.php');
            break;
            case 'docs':
                include('docs_perfil.php');
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
}
?>

</html>