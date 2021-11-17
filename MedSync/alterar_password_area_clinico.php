<html>
<link rel="stylesheet" type="text/css" href="./css/perfil_area_doente.css">
<div class="alterar_senha_doente_header">
<h3>Alterar senha de acesso</h3>
<div>

<div class="alterar_senha_doente">

<form method="POST">
<div class="alterar_senha_doente_form">
  <input type="password" name="pass_antiga_clinico" placeholder="Password antiga"><br>
  <input type="password" name="pass_nova_clinico" placeholder="Nova password"><br>
  <input type="password" name="rep_pass_nova_clinico" placeholder="Repita a nova password"><br>
</div>
<div class="alterar_senha_doente_submit">
<input class="confirmar_alterar_password" name="alterar_password_clinico" type="submit" value="Submeter" onclick="return confirm('Deseja alterar a password? (a sessão será encerrada aquando da alteração.)')">
</div>
</form>

</div>

<?php 

include('connection_db.php');

  if(isset($_POST['alterar_password_clinico'])==true){
    $utilizador=$_SESSION['utilizador'];

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    $sql = 'SELECT senha FROM admins WHERE utilizador = "'.$utilizador.'"';
    $result = mysqli_query ($link ,$sql)
    or die('The query failed: ' . mysqli_error($link));

    $row = mysqli_fetch_array($result);
   
    if($_POST['pass_antiga_clinico']=="$row[0]" && $_POST['pass_nova_clinico']==$_POST['rep_pass_nova_clinico']){

      $nova_pass_clinico= $_POST['rep_pass_nova_clinico'];
      $sql2 = 'UPDATE admins SET senha="'.$nova_pass_clinico.'" WHERE utilizador = "'.$utilizador.'"';
      $result2 = mysqli_query ($link ,$sql2);
      session_destroy();
      header("location:index.php?operacao=homepage");
    }
}

?>
</html>