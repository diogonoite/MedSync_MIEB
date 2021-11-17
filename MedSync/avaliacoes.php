<html>
<link rel="stylesheet" type="text/css" href="./css/utentess.css">
<style>
.pagination li{ display:inline-block; margin:0 5px;}

</style>
<?php
// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

if(isset($_GET['id'])){
    $id_perfil=$_GET['id'];
}

if(isset($_GET['page'])){
    $page=$_GET['page'];
} else{
    $page=1;
}

$number_per_page=4;
$start_from=($page-1)*4;


    $lista_avaliacoes = "SELECT * FROM avaliacao_barthel WHERE id_barthel=$id_perfil ORDER BY nr_aval DESC limit $start_from,$number_per_page ";
$result_avaliacoes = mysqli_query($link ,$lista_avaliacoes)
or die('The query failed: ' . mysqli_error($link));

?>
<div class="graf_info_anterior">
<table id="table">
<thead>
<tr class="head">
    <th>Avaliação</th>
    <th>Score</th>
    <th>Data</th>
    <th>Clínico</th>
    <th>Comentário</th>
    <th></th>
</tr>
</thead>
<tbody>
<?php 

if(($result_avaliacoes) AND ($result_avaliacoes!=0)){
    while($row_avaliacoes =mysqli_fetch_assoc($result_avaliacoes)){
?>
<tr class="dados_lista">
        <td><?php echo $row_avaliacoes['nr_aval']; ?>º</a></td>
        <td><a href='dashboard.php?operacao=utentes&id=<?php echo $id_perfil;?>&sub=avaliar&graf=consultar&page=<?php echo $page; ?>&nr=<?php echo $row_avaliacoes['nr_aval'];?>&acao=score'><i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;<?php echo $row_avaliacoes['score']; ?></td>
        <td><?php echo $row_avaliacoes['data']; ?></td>
        <td></td>
        <td><a href='dashboard.php?operacao=utentes&id=<?php echo $id_perfil; ?>&sub=avaliar&graf=consultar&page=<?php echo $page; ?>&nr=<?php echo $row_avaliacoes['nr_aval'];?>&acao=comentario'><?php if($row_avaliacoes['comentario_barthel']==true){echo '<i class="fa fa-search-plus" aria-hidden="true"></i>&nbsp;Sim';} ?></td>
        <td class="excluir"><i class="fa fa-trash" aria-hidden="true"></i>Excluir</td>
</tr>
<?php
    }

}else{
    echo "Não foram encontrados registos";
}

?>

</tbody>
</table>



<div class="paginacao">

<?php
 
 $nr_aval_query = "SELECT * FROM avaliacao_barthel WHERE id_barthel=$id_perfil";
 $total_aval = mysqli_query ($link,$nr_aval_query);
 $aval_rows = mysqli_num_rows($total_aval);
 $total_aval_page = ceil($aval_rows/$number_per_page);


if($page>1){
    echo "<a href='dashboard.php?operacao=utentes&id=".$id_perfil."&sub=avaliar&graf=consultar&page=".($page-1)."' class='btn'>Anterior</a>";

}

for($i=1;$i<=$total_aval_page;$i++){
echo "<a href='dashboard.php?operacao=utentes&id=".$id_perfil."&sub=avaliar&graf=consultar&page=".$i."' class='btn '>$i</a>";
}

if($i>$page+1){
    echo "<a href='dashboard.php?operacao=utentes&id=".$id_perfil."&sub=avaliar&graf=consultar&page=".($page+1)."' class='btn'>Seguinte</a>";

}
?>
</div>
</div>
<div class="informacao_anteriores">
<?php if (isset($_GET['acao'])==true){
        switch($_GET['acao']){
            case 'score':
                include('score.php');
            break;
            case 'comentario':
                include('comentario.php');
            break;
        }
    }
        ?>
</div>

</html>