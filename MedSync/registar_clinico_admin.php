<html>
<link rel="stylesheet" type="text/css" href="./css/utentess.css">
<link rel="stylesheet" type="text/css" href="./css/users.css">

<?php
session_start();
if(isset($_POST['confirmar_registo_clinico'])==true){

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $sql = 'SELECT * FROM admins WHERE (utilizador = "'.$_POST['utilizador'].'")';
    $result = mysqli_query ($link ,$sql)
    or die('The query failed: ' . mysqli_error($link));
    $number = mysqli_num_rows($result); //se = 1, tem um utilizador já registado com esse nome

    if($number!=1){
    $inserir_clinico = 'INSERT INTO `admins`(`id`,`utilizador`,`senha`, `profissao`, `nome`, `contacto`,`sexo`) VALUES (null,"'.$_POST['utilizador'].'","clinico","'.$_POST['profissao'].'","'.$_POST['nome'].'","'.$_POST['contacto'].'","'.$_POST['select_gener'].'")';
    $result_clinico = mysqli_query ($link ,$inserir_clinico)
    or die('The query failed: ' . mysqli_error($link));

    echo '<script>window.location.href="dashboard_admin.php?operacao=clinicos";</script>';
        exit;
        
    }else{
           echo '<p style="color:black; font-family:sans-serif; background-color:red; text-align:center;">Nome de utilizador já registado, tente outra vez.</p>';
        }
}

?>

<div class="box_registar">
<div class="title">
    Registar novo clínico
</div>
<div class="registar_utente">
<form method="post" action="#">
<!-- <div class="input_field">
    <label>Número do processo</label>
    <input type="text" name="processo" placeholder="Processo" class="input">
    </div> -->
    <div class="input_field">
    <label>Nome</label>
    <input type="text" name="nome" placeholder="Nome" class="input" maxlength="16">
    </div>
    <div class="input_field">
    <label>Utilizador</label>
    <input type="text" name="utilizador" placeholder="Username" class="input" maxlength="16">
    </div>
    <div class="input_field">
    <label>Profissão</label>
    <input type="text" name="profissao" placeholder="Profissão" class="input" maxlength="15">
    </div>
    <div class="input_field">
    <label>Contacto</label>
    <input type="text" name="contacto" placeholder="Contacto" class="input" maxlength = "9">
    </div>
    <div class="input_field">
    <label>Género</label>
    <div class="custom_select">
        <select name="select_gener">
            <option value=""> Selecione </option>
            <option value="F"> Feminino </option>
            <option value="M"> Masculino </option>
</select>
</div>
</div>
    
<div class="input_field termos">
    <label class="check">
        <input type="checkbox" required>
        <span class="checkmark"></span>
    </label>
    <p>Concordo com os termos de utilização</p>
</div>
<div class="input_field">
    <label  href="#"><input class="btn" type="submit" name="confirmar_registo_clinico" value="Registar utente"></label>
    </form>
</div>
</div>

</html>