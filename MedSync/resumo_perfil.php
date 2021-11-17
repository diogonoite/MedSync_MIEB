<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<?php
// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

$id_perfil=$_GET['id'];

$comentarios_query = "SELECT * FROM comentario_principal WHERE id=$id_perfil ORDER BY nr_comentario_principal DESC";
$comentarios_principais_result = mysqli_query ($link ,$comentarios_query)
or die('The query failed: ' . mysqli_error($link));

?>

<div class="resumo">
<div class="resumo_header">

<h2>Resumo do quadro clínico</h2>

<?php
if(isset($_GET['id'])){
    $id_user=$_GET['id'];
}
echo'<a href="dashboard.php?operacao=utentes&id='.$id_user.'&sub=adicionar_resumo"><button type="button" class="inserir_nota">Inserir nota</button></a>';
?>
</div>



<div class="comentarios_principais">
<?php
while($comentarios_principais =mysqli_fetch_assoc($comentarios_principais_result)){
    $data_formato_comum = date("d-m-Y", strtotime($comentarios_principais['data_comentario']));
    echo '<p style="font-size:16px;"><b><i class="fa fa-thumb-tack" aria-hidden="true"></i> Data do registo: </b>'.$data_formato_comum.' às '.$comentarios_principais['hora_comentario'].'</p>';
    echo '<p class="comentario_txt">'.$comentarios_principais['comentario_principal'].'</p>';
    
    
}
?>
</div>
</div>

</html>