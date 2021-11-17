<html>
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">

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
      header("location:dashboard.php?operacao=editar_perfil_utente&id=$utilizador");
    }




?>
<form class="atualizar_dados_area_utente" method="POST">

<div class="atualizar_area_utente" style="color:white; margin-top:5%;">

<div class="atualizar_area_utente_bloco1" style="margin-top:3%;">
Nome: <input type="text" name="nome" value="<?php echo $row['nome'];?>" readonly style="cursor:pointer;"><br>
Data de Nascimento: <input type="date" name="data_nascimento" value="<?php echo $row['data_nascimento'];?>" readonly style="cursor:pointer;"><br>
</div>
<div class="atualizar_area_utente_bloco2" style="margin-top:3%;">
Nacionalidade: <input type="text" name="nacionalidade" value="<?php echo $row['nacionalidade'];?>" readonly style="cursor:pointer;"><br>
Profissão: <input type="text" name="profissao" value="<?php echo $row['profissao'];?>" readonly style="cursor:pointer;"><br>
</div>
<div class="atualizar_area_utente_bloco3" style="margin-top:3%;">
Contacto: <input type="text" name="contacto" value="<?php echo $row['contacto'];?>" readonly style="cursor:pointer;"><br>
Morada: <input type="text" name="morada" value="<?php echo $row['morada'];?>" readonly style="cursor:pointer;"><br>
</div>

<div class="atualizar_area_utente_bloco4">
<input type="submit" name="atualizar_area_utente" value="Atualizar">
</div>
</div>
</form>



</html>