<html>
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">

<div class="editar_perfil_area_doente_header">
<h3>Editar</h3>
</div>

<?php
    $utilizador=$_GET['id'];
    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $sql = 'SELECT * FROM utentes WHERE id_utente = "'.$utilizador.'"';
    $result = mysqli_query ($link ,$sql)
    or die('The query failed: ' . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

/* atualizar dados*/

    if(isset($_POST['atualizar_area_utente'])==true){

      $sql2 = 'UPDATE utentes SET nome="'.$_POST['nome'].'",data_nascimento="'.$_POST['data_nascimento'].'", morada="'.$_POST['morada'].'", nacionalidade="'.$_POST['nacionalidade'].'", profissao="'.$_POST['profissao'].'", contacto="'.$_POST['contacto'].'"  WHERE id_utente = "'.$utilizador.'"';
      $result2 = mysqli_query ($link ,$sql2);
      header("location:dashboard.php?operacao=editar_perfil_utente&id=$utilizador");
    }




?>
<form class="atualizar_dados_area_utente" method="POST">

<div class="atualizar_area_utente">

<div class="atualizar_area_utente_bloco1" style="margin-top:3%;">
Nome: <input type="text" name="nome" value="<?php echo $row['nome'];?>" maxlength="16"><br>
Data de Nascimento: <input type="date" name="data_nascimento" value="<?php echo $row['data_nascimento'];?>" ><br>
</div>
<div class="atualizar_area_utente_bloco2" style="margin-top:3%;">
Profissão: <input type="text" name="profissao" value="<?php echo $row['profissao'];?>" maxlength="15"><br>
Nacionalidade: <input type="text" name="nacionalidade" value="<?php echo $row['nacionalidade'];?>" maxlength="12"><br>
</div>
<div class="atualizar_area_utente_bloco3" style="margin-top:3%;">
Contacto: <input type="text" name="contacto" value="<?php echo $row['contacto'];?>" maxlength="9"><br>
Morada: <input type="text" name="morada" value="<?php echo $row['morada'];?>" maxlength="12"><br>
</div>

<div class="atualizar_area_utente_bloco4">
<input type="submit" name="atualizar_area_utente" value="Atualizar" onclick="return confirm('Deseja atualizar o perfil com as novas informações?')">
</div>
</div>
</form>



</html>