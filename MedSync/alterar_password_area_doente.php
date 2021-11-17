<html>
<link rel="stylesheet" type="text/css" href="./css/perfil_area_doente.css">
<div class="alterar_senha_doente_header">
<h3>Alterar senha de acesso</h3>
<div>

<div class="alterar_senha_doente">

<form method="POST">
<div class="alterar_senha_doente_form">
  <input type="password" name="pass_antiga_doente" placeholder="Password antiga"><br>
  <input type="password" name="pass_nova_doente" placeholder="Nova password"><br>
  <input type="password" name="rep_pass_nova_doente" placeholder="Repita a nova password"><br>
</div>
<div class="alterar_senha_doente_submit">
<input class="confirmar_alterar_password" name="alterar_password_doente" type="submit" value="Submeter" onclick="return confirm('Deseja alterar a password? (a sessão será encerrada aquando da alteração.)')">
</div>
</form>

</div>

<?php if(isset($_POST['alterar_password_doente'])==true){
    $utilizador=$_SESSION['utilizador'];

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $sql = 'SELECT senha FROM utentes WHERE id_utente = "'.$utilizador.'"';
    $result = mysqli_query ($link ,$sql)
    or die('The query failed: ' . mysqli_error($link));

    $row = mysqli_fetch_array($result);
   
    if($_POST['pass_antiga_doente']=="$row[0]" && $_POST['pass_nova_doente']==$_POST['rep_pass_nova_doente']){

      $nova_pass_doente= $_POST['rep_pass_nova_doente'];
      $sql2 = 'UPDATE utentes SET senha="'.$nova_pass_doente.'" WHERE id_utente = "'.$utilizador.'"';
      $result2 = mysqli_query ($link ,$sql2);
      session_destroy();
      header("location:index.php?operacao=homepage");
    }
}

?>
</html>