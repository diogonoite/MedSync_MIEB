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


<title>Dashboard</title>    

</head>
<body>
    <div class="barra_dash">
    <a href="dashboard.php?operacao=home"><img src="./img/logo.png" height="10%" width="75%" class="logo_dash"></a>
    <?php if (isset($_GET['operacao'])==true){
        switch($_GET['operacao']){
            case 'home':
                include('dash_menu1.php');
            break;
            case 'utentes':
                include('dash_menu2.php');
            break;
            case 'editar_perfil_utente':
                include('dash_menu2.php');
            break;
            case 'registar_utente':
                include('dash_menu2.php');
            break;
            case 'reabilitacao':
                include('dash_menu3.php');
            break;
            case 'consultas':
                include('dash_menu4.php');
            break;

            default : include('dash_menu1.php');
        }
    }
        else{
            include('dash_menu1.php');
        }
        ?>

    
</div>
    
    <div class="header">
        <!-- <div class="procura">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="" placeholder="Procura">
        </div> -->
        <div class="utilizador">
            <!-- <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i></a> -->
            <a href="dashboard.php?operacao=perfil_clinico"><i class="fa fa-user" aria-hidden="true"></i></a>
            <!-- <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a> -->
        </div>
    </div>  
<div class="back_meio">

<?php if (isset($_GET['operacao'])==true){
        switch($_GET['operacao']){
            case 'home':
                include('dash_home.php');
            break;
            case 'utentes':
                if (isset($_GET['id'])==true){
                    include('perfil.php');}else{
                    include('dash_utentes.php');
                    }
            break;
            case 'reabilitacao':
                include('dash_reabilitacao.php');
            break;
            case 'consultas':
                include('dash_consultas.php');
            break;
            case 'monitorizacao':
                include('monitorizacao.php');
            break;
            case 'registar_utente':
                include('registar_utente.php');
            break;
            case 'perfil_clinico':
                include('perfil_clinico.php');
            break;
            case 'editar_perfil_utente':
                include('editar_perfil_lista_utentes.php');
            break;

            default : include('dash_home.php');
        }
    }
        else{
            include('dash_home.php');
        }
        ?>

</div>

</body>
</html>