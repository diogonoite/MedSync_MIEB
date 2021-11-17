<html>
<link rel="stylesheet" type="text/css" href="./css/utentess.css">
<link rel="stylesheet" type="text/css" href="./css/users.css">

<?php
session_start();
if(isset($_POST['confirmar_registo_utente'])==true){

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $inserir_utente = 'INSERT INTO `utentes`(`id_utente`,`processo`, `data_nascimento`, `morada`, `nacionalidade`, `contacto`, `sexo`, `profissao`,`senha`,`nome`) VALUES (null,null,"'.$_POST['data_nascimento'].'","'.$_POST['morada'].'","'.$_POST['nacionalidade'].'","'.$_POST['contacto'].'","'.$_POST['select_gener'].'","'.$_POST['profissao'].'","user","'.$_POST['nome'].'")';
    $result_utente = mysqli_query ($link ,$inserir_utente)
    or die('The query failed: ' . mysqli_error($link));
    
    $max_id_query = 'SELECT max(id_utente) FROM utentes';
    $max_id_result = mysqli_query ($link ,$max_id_query)
    or die('The query failed: ' . mysqli_error($link));
    $max_id = mysqli_fetch_row($max_id_result);

    echo '<script>window.location.href="dashboard_admin.php?operacao=utentes";</script>';
        exit;
}

?>

<div class="box_registar">
<div class="title">
    Registar novo utente
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
    <label>Data de nascimento</label>
    <input type="date" name="data_nascimento" placeholder="data de nascimento" class="input">
    </div>
    <div class="input_field">
    <label>Morada</label>
    <input type="text" name="morada" placeholder="Morada" class="input" maxlength="12">
    </div>
    <div class="input_field">
    <label>Nacionalidade</label>
    <input type="text" name="nacionalidade" placeholder="Nacionalidade" class="input" maxlength="12">
    </div>
    <div class="input_field">
    <label>Contacto</label>
    <input type="text" name="contacto" placeholder="Contacto" class="input" maxlength="9">
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
    <div class="input_field">
    <label>Profissão</label>
    <input type="text" name="profissao" placeholder="Profissão" class="input" maxlength="15">    
</div>
<div class="input_field termos">
    <label class="check">
        <input type="checkbox" required>
        <span class="checkmark"></span>
    </label>
    <p>Concordo com os termos de utilização</p>
</div>
<div class="input_field">
    <label  href="#"><input class="btn" type="submit" name="confirmar_registo_utente" value="Registar utente"></label>
    </form>
</div>
</div>

</html>