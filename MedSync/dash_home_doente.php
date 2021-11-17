
<html>
<link rel="stylesheet" type="text/css" href="./css/calendarios.css">
<link rel="stylesheet" type="text/css" href="./css/users.css">
<link rel="stylesheet" type="text/css" href="./css/perfil_area_doente.css">
<?php

session_start();
// $link = mysqli_connect('localhost', 'root', 'root','medsync')
//     or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

    $utilizador=$_SESSION['utilizador'];

    $sql = 'SELECT * FROM utentes WHERE id_utente = "'.$utilizador.'"';
$result = mysqli_query ($link ,$sql)
or die('The query failed: ' . mysqli_error($link));

$row = mysqli_fetch_array($result);

$sql1 = 'SELECT * FROM utentes';
$result1 = mysqli_query ($link ,$sql1);
$nr_utentes = mysqli_num_rows($result1);

?>

<div class="info"> 
        <p class="dshb">Bem-vind<?php if($row[6]=="F"){echo 'a';}elseif($row[6]=="M"){echo 'o';}else{echo 'x';}?> à area do doente,</p>
</div>
<div class="avatar_info">
    <img class="cara" src="./img/outras.png">
    <div class="nome_id">
    <p class="nome"><?php echo "$row[9]" ;?></p>
    </div>
    <div class="profissao">
    <p><?php echo "ID: "; echo $row[0];?></p>
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

<div class="extra">
<div onload="renderDate()">
    <div class="wrapper">
        <div class="calendar">
            <div class="month">
                    <div class=prev onclick="moveDate('prev')">
                     <span> &#10094; </span>
                    </div>
    <div>
        <h2 id="month">fevereiro</h2>
        <p class="oculto" id="date_str"></p>
        </div>
        <div class="next" onclick="moveDate('next')">
        <span> &#10095; </span>
        </div>
        </div>
        <div class="weekends">
            <div>Dom</div>
            <div>Seg</div>
            <div>Ter</div>
            <div>Qua</div>
            <div>Qui</div>
            <div>Sex</div>
            <div>Sáb</div>
        </div>
        <div class="days">
          
</div>
    </div>
    </div>
    
    </div>
   
    <script>
    RenderDate(dt);
    </script>
</div>

</html>