<?php
session_start();
if($_SESSION['authentication']==1){
   
}else{
    header("location:index.php?operacao=login.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/users.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="./js/date.js"></script>
<script type="text/javascript" src="./js/hour.js"></script>
<link rel="stylesheet" type="text/css" href="./css/calendarios.css">
<script type="text/javascript" src="./js/calendar.js"></script>


<title>Área do doente</title>    

</head>
<body>
    <div class="barra_dash">
    <a href="dashboard_doente.php?operacao=home"><img src="./img/logo.png" height="10%" width="75%" class="logo_dash"></a>
    <?php if (isset($_GET['operacao'])==true){
        switch($_GET['operacao']){
            case 'home':
                include('dash_menu1_doente.php');
            break;
            case 'reabilitacao_doente':
                include('dash_menu2_doente.php');
            break;
            case 'reabilitacao_doente_anteriores':
                include('dash_menu2_doente.php');
            break;
            case 'feedback_doente':
                include('dash_menu3_doente.php');
            break;
            case 'perfil_doente':
                include('dash_menu4_doente.php');
            break;
            case 'monitorizacao':
                include('dash_menu5_doente.php');
            break;

            default : include('dash_menu1_doente.php');
        }
    }
        else{
            include('dash_menu1_doente.php');
        }
        ?>

    
</div>
    
    <div class="header">
        <!--  <div class="procura">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="" placeholder="Procura">
        </div> -->
        <div class="utilizador">
            <!-- <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a> -->
            <a href="dashboard_doente.php?operacao=perfil_doente"><i class="fa fa-user" aria-hidden="true"></i></a>
            <!-- <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a> -->
        </div>
    </div>  
<div class="back_meio">

<?php if (isset($_GET['operacao'])==true){
        switch($_GET['operacao']){
            case 'home':
                include('dash_home_doente.php');
            break;
            case 'reabilitacao_doente':
                include('reabilitacao_area_doente.php');
            break;
            case 'reabilitacao_doente_anteriores':
                include('reabilitacoes_anteriores_doente.php');
            break;
            case 'feedback_doente':
                include('feedback_area_doente.php');
            break;
            case 'perfil_doente':
                include('perfil_area_doente.php');
            break;
     
            default : include('dash_home_doente.php');
        }
    }
        else{
            include('dash_home_doente.php');
        }
        ?>

</div>

</body>
</html>