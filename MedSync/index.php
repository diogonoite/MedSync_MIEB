<html>
<head>
    <meta charset="utf-8">
    
<link rel="stylesheet" type="text/css" href="./css/mainn.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="./js/slideshow.js"></script>

<title>MedSync</title>    

<link rel ="icon" href= "https://ibb.co/YkjwKrP" type="image/x-icon">

</head>
<body>
<div class="main_imagem">
    <header class="barra_cima">
    <div class="menu_meio">
                <a href="index.php?operacao=homepage"> 
                <img src="./img/logo.png" height="65px" width="200px"> 
                </a>
                <ul>
                    <li><a href="index.php?operacao=contactos"><button class="contactos"><i class="fa fa-address-book-o"></i>&nbsp;Contactos</button></a></li>
                    <li><a href="index.php?operacao=sobre"><button class="sobre"><i class="fa fa-info"></i>&nbsp;Sobre nós</button></a></li>
                    <li><a href="index.php?operacao=projeto"><button class="projeto"><i class="fa fa-hospital-o"></i>&nbsp;Projeto</button></a></li>
                    <li><a href="index.php?operacao=login"><button class="login"><i class="fa fa-user-circle"></i>&nbsp;Login</button></a></li>
                </ul>      
    </div>
    </header>
    
    <?php if (isset($_GET['operacao'])==true){
        switch($_GET['operacao']){
            case 'homepage':
                include('homepage.php');
            break;
            case 'contactos':
                include('contactar.php');
            break;
            case 'sobre':
                include('sobre_nos.php');
            break;
            case 'projeto':
                include('projeto.php');
            break;
            case 'login':
                include('login.php');
            break;
            case 'checklogin':
                if($_SESSION['authentication']==1){
                
                }
                else{
                    include('login.php');
                }
            break;
            default : include('homepage.php');
        }
    }
        else{
            include('homepage.php');
        }
        ?>
    </div>
    <!-- <div class="barra_fundo"> 
        Diogo Rafael Noite Ramos nº53462 MIEB FCT-UNL
    </div> -->
    <script>
    showSlides(slideIndex);
    </script>
</body>
</html>