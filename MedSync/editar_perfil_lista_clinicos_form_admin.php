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

    $sql = 'SELECT * FROM admins WHERE id = "'.$utilizador.'"';
    $result = mysqli_query ($link ,$sql)
    or die('The query failed: ' . mysqli_error($link));
    $row = mysqli_fetch_assoc($result);

/* atualizar dados*/

    if(isset($_POST['atualizar_area_utente'])==true){

      $sql2 = 'UPDATE admins SET nome="'.$_POST['nome'].'",profissao="'.$_POST['profissao'].'", contacto="'.$_POST['contacto'].'", senha="'.$_POST['senha'].'", sexo="'.$_POST['select_gener'].'"  WHERE id = "'.$utilizador.'"';
      $result2 = mysqli_query ($link ,$sql2);
      header('location:dashboard_admin.php?operacao=editar_clinico&id='.$_GET['id'].'');
    }




?>
<form class="atualizar_dados_area_utente" method="POST">

<div class="atualizar_area_utente">

<div class="atualizar_area_utente_bloco1" style="margin-top:3%;">
Nome: <input type="text" name="nome" value="<?php echo $row['nome'];?>" maxlength="16"><br>
Género:
        <select name="select_gener">
        <?php if($row['sexo']=="F"){echo'
            <option value="F"> Feminino </option>
            <option value="M"> Masculino </option>';}else if($row['sexo']=="M"){
              echo'<option value="M"> Masculino </option>
              <option value="F"> Feminino </option>';
            }else{
              echo'
              <option value="X"> Outro </option>
              <option value="M"> Masculino </option>
              <option value="F"> Feminino </option>';
            } ?>
</select>
</div>
<div class="atualizar_area_utente_bloco2" style="margin-top:3%;">
Profissão: <input type="text" name="profissao" value="<?php echo $row['profissao'];?>" maxlength="15"><br>
Nova password: <input type="password" value="<?php echo $row['senha'];?>" name="senha"><br>
</div>
<div class="atualizar_area_utente_bloco3" style="margin-top:3%;">
Contacto: <input type="text" name="contacto" value="<?php echo $row['contacto'];?>" maxlength = "9"><br>
</div>



<div class="atualizar_area_utente_bloco4">
<input type="submit" name="atualizar_area_utente" value="Atualizar" onclick="return confirm('Deseja atualizar o perfil com as novas informações?')">
</div>
</div>
</form>



</html>