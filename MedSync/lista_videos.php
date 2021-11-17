<html>
<link rel="stylesheet" type="text/css" href="./css/reabilitacao.css">

<div class="wrap_main_listavideos">

<?php
if (($_GET['pt'])=="ombro"){
        echo'<div class="videos_ombro">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=ombro"><img class="icones_videos_active" src="./img/ombro.png"/></a>
        </div>
        <div class="videos_cotovelo">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=cotovelo"><img class="icones_videos" src="./img/cotovelo.png"/></a>
        </div>
        <div class="videos_antebraco">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=antebraco"><img class="icones_videos" src="./img/antebraco.png"/></a>
        </div>
        <div class="videos_pulso_mao">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=maopulso"><img class="icones_videos" src="./img/maopulso.png"/></a>
        </div>
        <div class="videos_pulso_mao">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=outros"><img class="icones_videos" src="./img/outros_ex.png"/></a>
        </div>';
        }
        elseif(($_GET['pt'])=="cotovelo"){
            echo'<div class="videos_ombro">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=ombro"><img class="icones_videos" src="./img/ombro.png"/></a>
            </div>
            <div class="videos_cotovelo">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=cotovelo"><img class="icones_videos_active" src="./img/cotovelo.png"/></a>
            </div>
            <div class="videos_antebraco">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=antebraco"><img class="icones_videos" src="./img/antebraco.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=maopulso"><img class="icones_videos" src="./img/maopulso.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=outros"><img class="icones_videos" src="./img/outros_ex.png"/></a>
            </div>';
        }
        elseif(($_GET['pt'])=="antebraco"){
            echo'<div class="videos_ombro">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=ombro"><img class="icones_videos" src="./img/ombro.png"/></a>
            </div>
            <div class="videos_cotovelo">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=cotovelo"><img class="icones_videos" src="./img/cotovelo.png"/></a>
            </div>
            <div class="videos_antebraco">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=antebraco"><img class="icones_videos_active" src="./img/antebraco.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=maopulso"><img class="icones_videos" src="./img/maopulso.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=outros"><img class="icones_videos" src="./img/outros_ex.png"/></a>
            </div>';
        }
        elseif(($_GET['pt'])=="maopulso"){
            echo'<div class="videos_ombro">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=ombro"><img class="icones_videos" src="./img/ombro.png"/></a>
            </div>
            <div class="videos_cotovelo">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=cotovelo"><img class="icones_videos" src="./img/cotovelo.png"/></a>
            </div>
            <div class="videos_antebraco">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=antebraco"><img class="icones_videos" src="./img/antebraco.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=maopulso"><img class="icones_videos_active" src="./img/maopulso.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=outros"><img class="icones_videos" src="./img/outros_ex.png"/></a>
            </div>';
         }elseif(($_GET['pt'])=="outros"){
            echo'<div class="videos_ombro">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=ombro"><img class="icones_videos" src="./img/ombro.png"/></a>
            </div>
            <div class="videos_cotovelo">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=cotovelo"><img class="icones_videos" src="./img/cotovelo.png"/></a>
            </div>
            <div class="videos_antebraco">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=antebraco"><img class="icones_videos" src="./img/antebraco.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=maopulso"><img class="icones_videos" src="./img/maopulso.png"/></a>
            </div>
            <div class="videos_pulso_mao">
            <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=outros"><img class="icones_videos_active" src="./img/outros_ex.png"/></a>
            </div>';
         } else{
            echo'<div class="videos_ombro">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=ombro"><img class="icones_videos_active" src="./img/ombro.png"/></a>
        </div>
        <div class="videos_cotovelo">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=cotovelo"><img class="icones_videos" src="./img/cotovelo.png"/></a>
        </div>
        <div class="videos_antebraco">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=antebraco"><img class="icones_videos" src="./img/antebraco.png"/></a>
        </div>
        <div class="videos_pulso_mao">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=maopulso"><img class="icones_videos" src="./img/maopulso.png"/></a>
        </div>
        <div class="videos_pulso_mao">
        <a href="dashboard.php?operacao=reabilitacao&sub=listavideos&pt=outros"><img class="icones_videos" src="./img/outros_ex.png"/></a>
        </div>';
        }
?>



</div>

<div class="lista_videos_switch">
<?php
if (isset($_GET['pt'])==true){
        switch($_GET['pt']){
            case 'ombro':
                include('videos_ombro.php');
            break;
            case 'cotovelo':
                include('videos_cotovelo.php');
            break;
            case 'antebraco':
                include('videos_antebraco.php');
            break;
            case 'maopulso':
                include('videos_maopulso.php');
            break;
            case 'outros':
                include('videos_outros.php');
            break;
        }
    }
        else{
            include('videos_ombro.php');
        }
?>

</div>

</html>