<html>
<link rel="stylesheet" type="text/css" href="./css/reabilitacao.css">

<?php

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

$query = "SELECT * FROM videos_rehab WHERE titulo LIKE '%cotovelo%' ORDER BY titulo ASC";
$result_videos = mysqli_query ($link ,$query)
or die('The query failed: ' . mysqli_error($link));

while($lista_videos = mysqli_fetch_assoc($result_videos)){
echo "
<div class='caixa_video'>
<div class='titulo_video_lista'>"
.$lista_videos['titulo'].
"
</div>
<video width='100%' height='100%' controls> <source src='videos/".$lista_videos['nome_ficheiro']."' type='video/webm'></video>

</div>";
}

?>
</html>