
<html>
<link rel="stylesheet" type="text/css" href="./css/users.css">
<link rel="stylesheet" type="text/css" href="./css/perfil_area_doente.css">

<?php

session_start();
// $link = mysqli_connect('localhost', 'root', 'root','medsync')
//     or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

    $utilizador=$_SESSION['utilizador'];

    $sql = 'SELECT * FROM admins WHERE utilizador = "'.$utilizador.'"';
$result = mysqli_query ($link ,$sql)
or die('The query failed: ' . mysqli_error($link));

$row = mysqli_fetch_array($result);

?>

<div class="info"> 
        <p class="dshb">Administração da plataforma,</p>
</div>
<div class="avatar_info">
    <img class="cara" src="./img/user-icon.png">
    <div class="nome_id">
    <p class="nome">ADMINISTRADOR</p>
    <p class="id_n">ID: admin</p>
    </div>
    <div class="profissao">
    <p>Gestão/Manutenção</p>
    </div>
</div>
<div class="data">

<div class="bloco_data">

<div class="data_real">
<span id="datinha"></span>
<script type="text/javascript">window.onload = data('datinha');</script>
</div>

<div class="hora_real">
<span id="horita"></span>
<script type="text/javascript">window.onload = hora('horita');</script>
</div>

</div>

</div>

</html>