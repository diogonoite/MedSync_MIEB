<?php
session_start();
if($_SESSION['authentication']==1){
   
}else{
    header("location:index.php?operacao=login.php");
}
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/userss.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="./js/date.js"></script>
<script type="text/javascript" src="./js/hour.js"></script>
<link rel="stylesheet" type="text/css" href="./css/calendarios.css">
<script type="text/javascript" src="./js/calendar.js"></script>

<title>Admin</title>    

</head>
<body>
    <div class="barra_dash">
    <a href="dashboard_admin.php?operacao=home"><img src="./img/logo.png" height="10%" width="75%" class="logo_dash"></a>
    <?php if (isset($_GET['operacao'])==true){
        switch($_GET['operacao']){
            case 'home':
                include('dash_menu1_admin.php');
            break;
            case 'utentes':
                include('dash_menu2_admin.php');
            break;
            case 'registar_utente':
                include('dash_menu2_admin.php');
            break;
            case 'editar_utente':
                include('dash_menu2_admin.php');
            break;
            case 'registar_clinico':
                include('dash_menu3_admin.php');
            break;
            case 'clinicos':
                include('dash_menu3_admin.php');
            break;
            case 'editar_clinico':
                include('dash_menu3_admin.php');
            break;
            case 'alertas':
                include('dash_menu4_admin.php');
            break;
            

            default : include('dash_menu1_admin.php');
        }
    }
        else{
            include('dash_menu1_admin.php');
        }
        ?>

    
</div>
    
    <div class="header">
        <div class="utilizador">
        </div>
    </div>  
<div class="back_meio">

<?php if (isset($_GET['operacao'])==true){
        switch($_GET['operacao']){
            case 'home':
                include('dash_home_admin.php');
            break;
            case 'utentes':
                include('dash_utentes_admin.php');
            break;
            case 'clinicos':
                include('dash_clinicos_admin.php');
            break;
            case 'registar_utente':
                include('registar_utente_admin.php');
            break;
            case 'editar_utente':
                include('editar_utente_admin.php');
            break;
            case 'registar_clinico':
                include('registar_clinico_admin.php');
            break;
            case 'editar_clinico':
                include('editar_clinico_admin.php');
            break;
            case 'alertas':
                include('alertas.php');
            break;

            default : include('dash_home_admin.php');
        }
    }
        else{
            include('dash_home_admin.php');
        }
        ?>

</div>

</body>
</html>