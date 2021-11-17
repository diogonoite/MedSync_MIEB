<html>
<link rel="stylesheet" type="text/css" href="./css/utentess.css">
<link rel="stylesheet" type="text/css" href="./css/users.css">

<style>
.pagination li{ display:inline-block; margin:0 5px;}

</style>
<?php
session_start();

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

if(isset($_GET['page'])){
    $page=$_GET['page'];
} else{
    $page=1;
}

$num_per_page=10;
$start_from=($page-1)*10;


    $lista_utentes = "SELECT * FROM admins ORDER BY id DESC limit $start_from,$num_per_page";
$result_lista = mysqli_query ($link ,$lista_utentes)
or die('The query failed: ' . mysqli_error($link));


?>

<div class="utentes_texto"> 

<p class="utentes_txt">Gestão dos clínicos registados,</p>
</div>

<a href="dashboard_admin.php?operacao=registar_clinico"><button class="registar"><i class="fa fa-plus-circle" aria-hidden="true"></i>Registar novo clínico</button></a>
<form action="" method="post"> 
<input class="pesquisar_nr_processo" type="text" name="procurar_processo" placeholder="Nome ou utilizador..."/> 
<input class="pesquisar_nr_processo_submeter" type="submit" value="Pesquisar"/>
</form>



<table id="table">
<thead>
<tr class="head">
    <th>ID</th>
    <th>Nome</th>
    <th>Utilizador</th>
    <th>Profissão</th>
    <th>Contacto</th>
    <th></th>
    <th></th>

</tr>
</thead>
<tbody>

<?php

if (empty($_REQUEST['procurar_processo'])) {

if($result_lista!=0){
    while($row_usuario =mysqli_fetch_assoc($result_lista)){
        $nova_data = date("d/m/Y",strtotime($row_usuario['data_nascimento']));
echo '<tr class="dados_lista">
        <td>'.$row_usuario['id'].'</td>
        <td>'.$row_usuario['nome'].'</td>
        <td>'.$row_usuario['utilizador'].'</td>
        <td>'.$row_usuario['profissao'].'</td>
        <td>'.$row_usuario['contacto'].'</td>
        <td class="modificar"><a href="dashboard_admin.php?operacao=editar_clinico&id='.$row_usuario['id'].'""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
        <td class="excluir"><a href="dashboard_admin.php?operacao=clinicos&eliminar='.$row_usuario['id'].'" onclick="return confirm(\'Tem a certeza que deseja eliminar o doente selecionado?\')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
</tr>';

    }
    if($_GET['eliminar']==true){
        $eliminar_clinico_query = 'DELETE FROM admins WHERE id="'.$_GET['eliminar'].'"';
        $result_elimin_clinico = mysqli_query ($link ,$eliminar_clinico_query)
        or die('The query failed: ' . mysqli_error($link));
        echo "<script>window.location.href='dashboard_admin.php?operacao=clinicos';</script>";
        exit;
    }

}else{
    echo "Não foram encontrados utilizadores";
}

echo '

</tbody>
</table>



<div class="paginacao">';


 

$total_query = "select * from utentes";
$total_result = mysqli_query ($link,$total_query);
$total = mysqli_num_rows($total_result);
$total_page = ceil($total/$num_per_page);


if($page>1){
    echo "<a href='dashboard_admin.php?operacao=utentes&page=".($page-1)."' class='btn'>Anterior</a>";

}

for($i=1;$i<=$total_page;$i++){
echo "<a href='dashboard_admin.php?operacao=utentes&page=".$i."' class='btn '>$i</a>";
}

if($i>$page+1){
    echo "<a href='dashboard_admin.php?operacao=utentes&page=".($page+1)."' class='btn'>Seguinte</a>";

}

echo "<div>";

}else{ // procura de utilizadores php

    $nr_processo_inserido=$_REQUEST['procurar_processo'];

    $pesquisa_processo_query = "SELECT * FROM `admins` WHERE `nome` LIKE '".$nr_processo_inserido."%' OR `utilizador` LIKE '".$nr_processo_inserido."%' limit $start_from,$num_per_page";
    $pesquisa_processo= mysqli_query ($link ,$pesquisa_processo_query)
    or die('The query failed: ' . mysqli_error($link));

    if($pesquisa_processo!=0){
        while($pesquisa_processos =mysqli_fetch_assoc($pesquisa_processo)){
    echo '<tr class="dados_lista">
            <td>'.$pesquisa_processos['id'].'</td>
            <td>'.$pesquisa_processos['nome'].'</td>
            <td>'.$pesquisa_processos['utilizador'].'</td>
            <td>'.$pesquisa_processos['profissao'].'</td>
            <td>'.$pesquisa_processos['contacto'].'</td>
            <td class="modificar"><a href="dashboard_admin.php?operacao=editar_clinico&id='.$pesquisa_processos['id'].'""><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
          <td class="excluir"><a href="dashboard_admin.php?operacao=clinicos&eliminar='.$pesquisa_processos['id'].'" onclick="return confirm(\'Tem a certeza que deseja eliminar o doente selecionado?\')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
    </tr>';
    
        }

    }else{
        echo "";// falta colocar mensagem caso nao encontre utilizadores.... melhorar
    }
    
    echo '
    
    </tbody>
    </table>';
    
}

?>
</html> 