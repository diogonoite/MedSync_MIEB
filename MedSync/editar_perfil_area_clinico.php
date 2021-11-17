<html>
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">

<div class="editar_perfil_area_doente_header">
<h3>Atualizar dados do perfil</h3>
</div>

<?php
    $utilizador=$_SESSION['utilizador'];
    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $sql = 'SELECT * FROM admins WHERE utilizador = "'.$utilizador.'"';
    $result = mysqli_query ($link ,$sql)
    or die('The query failed: ' . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

/* atualizar dados*/

    if(isset($_POST['atualizar_area_clinico'])==true){

      $sql2 = 'UPDATE admins SET  contacto="'.$_POST['contacto'].'",profissao="'.$_POST['profissao'].'", nome="'.$_POST['nome'].'" WHERE utilizador = "'.$utilizador.'"';
      $result2 = mysqli_query ($link ,$sql2);
      header("location:dashboard.php?operacao=perfil_clinico&sub=editar_perfil");
    }


?>
<form class="atualizar_dados_area_utente" method="POST">

<div class="atualizar_area_utente">

<div class="atualizar_area_utente_bloco1" style="margin-top:5%;">
Nome: <input type="text" name="nome" value="<?php echo $row['nome'];?>" maxlength="16"><br>

</div>
<div class="atualizar_area_utente_bloco2" style="margin-top:5%;">
Profissão: <input type="text" name="profissao" value="<?php echo $row['profissao'];?>" maxlength="15"><br>
</div>
<div class="atualizar_area_utente_bloco3" style="margin-top:5%;">
Contacto: <input type="text" name="contacto" value="<?php echo $row['contacto'];?>" maxlength="9"><br>
</div>

<div class="atualizar_area_utente_bloco4">
<input type="submit" name="atualizar_area_clinico" value="Atualizar" onclick="return confirm('Deseja atualizar o perfil com as novas informações?')">
</div>
</div>
</form>



</html>