<?php
session_start();
if(isset($_POST['submit'])==true){
if(($_POST['utilizador']=="admin")AND($_POST['senha']=="admin")){
         $_SESSION['authentication']=1;
         header("Location:dashboard_admin.php"); 
     }else{

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $sql = 'SELECT * FROM admins WHERE (utilizador = "'.$_POST['utilizador'].'" AND senha = "'.$_POST['senha'].'")';
$result = mysqli_query ($link ,$sql)
or die('The query failed: ' . mysqli_error($link));
$number = mysqli_num_rows($result); //if it returns 1 it is a valid user


    $sql_senha_utente = 'SELECT senha FROM utentes WHERE processo = "'.$_POST['utilizador'].'"';
    $result_senha_utente = mysqli_query ($link ,$sql_senha_utente)
    or die('The query failed: ' . mysqli_error($link));
    $senha_utente = mysqli_fetch_array($result_senha_utente);

$sql_doente = 'SELECT * FROM utentes WHERE (id_utente = "'.$_POST['utilizador'].'" AND senha = "'.$_POST['senha'].'")';
$result_doente = mysqli_query ($link ,$sql_doente)
or die('The query failed: ' . mysqli_error($link));
$doente = mysqli_num_rows($result_doente); //if it returns 1 it is a valid user


if($number==1){
    header("Location:dashboard.php"); 
    $_SESSION['authentication']=1;
    $utilizador=$_POST['utilizador'];
    $_SESSION['utilizador']=$utilizador;
    
}elseif($doente==1){
    header("Location:dashboard_doente.php"); 
    $_SESSION['authentication']=1;
    $utilizador=$_POST['utilizador'];
    $_SESSION['utilizador']=$utilizador;
}
else{
    $_SESSION['authentication']=0;
     }

}
}

// if(($_POST['utilizador']=="admin")AND($_POST['senha']=="1234")){
//     $_SESSION['authentication']=1;
//     header("Location:dashboard.php"); 
// }else{
//     $_SESSION['authentication']=0;
// }
?>

<html>
<div class="loginBox">
<img src="./img/user-icon.png" class="user">
<h2 class="caixa-log">Log in</h2>
<div class="cima">
    <form method="post" action="index.php?operacao=checklogin">
    <p>Utilizador&nbsp;<i class="fa fa-envelope-o" aria-hidden="true"></i></p>
    <input type="text" name="utilizador" placeholder="Introduza utilizador">
    <p>Palavra-passe&nbsp;<i class="fa fa-key" aria-hidden="true"></i></p>
    <input type="password" name="senha" placeholder="Introduza palavra-passe">    
</div>
<div class="log">
    <a><input type="submit" name="submit" value="Entrar"></a>
    </form>
</div>
    
</div>
</html>