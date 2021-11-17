<html>

<div class="teste">
   <h1> Contacta-nos:</h1>

<?php
if(isset($_POST['submeter_contacto'])==true){

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');
    date_default_timezone_set('Europe/Lisbon');
    $data_contacto = date('Y/m/d', time());
    $inserir_report = 'INSERT INTO `contactos`(`id`,`nome`,`email`, `assunto`, `mensagem`,`data_contacto`) VALUES (null,"'.$_POST['nome_completo'].'","'.$_POST['email'].'","'.$_POST['assunto'].'","'.$_POST['mensagem'].'","'.$data_contacto.'")';
    $result_report = mysqli_query ($link ,$inserir_report)
    or die('The query failed: ' . mysqli_error($link));

    echo '<script>window.location.href="index.php?operacao=homepage";</script>';
        exit;
}

?>

 
<div class="formulario_contacto">
<form method="post">
    <div class="input_fielddd">
    <label>Nome</label>
    <input type="text" name="nome_completo" placeholder="Primeiro e último nome" class="input">
    </div>
    <div class="input_fielddd">
    <label>Email</label>
    <input type="text" name="email" placeholder="Email" class="input">
    </div>
    
    <div class="input_fielddd">
    <label>Assunto*</label>
    <div class="custom_select">
        <select name="assunto" required>
            <option value=""> Selecione </option>
            <option value="Bug "> Bug </option>
            <option value="Sugestão"> Sugestões </option>
            <option value="Outro"> Outros </option>
   </select>
   </div>
   </div>
<div class="input_mensagem">
    <label>Mensagem*</label>
    <textarea type="text" name="mensagem" placeholder="Escreva aqui" class="input" required></textarea>
</div>
<div class="input_submeter">
    <label  href="#"><input class="btn" type="submit" name="submeter_contacto" value="Submeter contacto" onclick="return confirm('Deseja submeter o formulário?')"></label>
    </form>
</div>
</div>
</div>
</div>
</html>