<html>
<link rel="stylesheet" type="text/css" href="./css/users.css">
<link rel="stylesheet" type="text/css" href="./css/utentess.css">

<div class="utentes_texto"> 

<p class="utentes_txt">Alertas/mensagens,</p>
</div>

<style>
.pagination li{ display:inline-block; margin:0 5px;}

</style>
<?php

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


    $lista_alertas = "SELECT * FROM contactos ORDER by id DESC limit $start_from,$num_per_page";
$result_lista = mysqli_query ($link ,$lista_alertas)
or die('The query failed: ' . mysqli_error($link));

?>

<table id="table" style="margin-top:10%;">
<thead>
<tr class="head">
    <th>ID</th>
    <th>Nome</th>
    <th>Contacto</th>
    <th>Assunto</th>
    <th>Mensagem</th>
    <th>Data</th>

</tr>
</thead>
<tbody>

<?php

if (empty($_REQUEST['procurar_nome'])) {

if($result_lista!=0){
    while($row =mysqli_fetch_assoc($result_lista)){
        $nova_data = date("d/m/Y",strtotime($row['data_contacto']));
echo '<tr class="dados_lista">
        <td>'.$row['id'].'</td>
        <td>'.$row['nome'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['assunto'].'</td>
        <td>'.$row['mensagem'].'</td>
        <td>'.$nova_data.'</td>
</tr>';

    }

}else{
    echo "Não foram encontrados utilizadores";
}

echo '

</tbody>
</table>



<div class="paginacao">';


 

$total_query = "select * from contactos";
$total_result = mysqli_query ($link,$total_query);
$total = mysqli_num_rows($total_result);
$total_page = ceil($total/$num_per_page);


if($page>1){
    echo "<a href='dashboard_admin.php?operacao=alertas&page=".($page-1)."' class='btn'>Anterior</a>";

}

for($i=1;$i<=$total_page;$i++){
echo "<a href='dashboard_admin.php?operacao=alertas&page=".$i."' class='btn '>$i</a>";
}

if($i>$page+1){
    echo "<a href='dashboard_admin.php?operacao=alertas&page=".($page+1)."' class='btn'>Seguinte</a>";

}

echo "<div>";

}else{ // procura de utilizadores php

    $nr_processo_inserido=$_REQUEST['procurar_nome'];

    $pesquisa_processo_query = "SELECT * FROM `utentes` WHERE `nome` LIKE '".$nr_processo_inserido."%' OR id_utente LIKE '".$nr_processo_inserido."%' limit $start_from,$num_per_page";
    $pesquisa_processo= mysqli_query ($link ,$pesquisa_processo_query)
    or die('The query failed: ' . mysqli_error($link));

    if($pesquisa_processo!=0){
        while($pesquisa_processos = mysqli_fetch_assoc($pesquisa_processo)){
            $nova_data = date("d/m/Y",strtotime($pesquisa_processos['data_nascimento']));
    echo '  <tr class="dados_lista">
            <td class="consultar"><a href="dashboard.php?operacao=utentes&id='.$pesquisa_processos['id_utente'].'"><i class="fa fa-search-plus" aria-hidden="true"></i></td>
            <td>'.$pesquisa_processos['id_utente'].'</td>
            <td>'.$pesquisa_processos['nome'].'</td>
            <td>'.$pesquisa_processos['contacto'].'</td>
            <td>'.$nova_data.'</td>
            <td>'.$pesquisa_processos['sexo'].'</td>
            <td class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
            <td class="excluir"><a href="dashboard.php?operacao=utentes&eliminar='.$pesquisa_processos['id_utente'].'" onclick="return confirm(\'Tem a certeza que deseja eliminar o doente selecionado?\')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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