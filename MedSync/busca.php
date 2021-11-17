<?php
include_once('listar_usuario.php');


//valor palavra

$result_usuario=$_POST['palavra'];


//pesquisar bd
$result_usuario = "SELECT * FROM utentes WHERE id_utente LIKE '%$result_usuario%'";
$result_usuario = mysqli_query ($link ,$result_usuario);

if(mysqli_num_rows ($result_usuario) !=0){
    while($rows =mysqli_fetch_assoc($result_usuario)){
    ?>

<tr class="dados_lista">
        <td><?php echo $rows['id_utente']; ?></td>
        <td><?php echo $rows['processo']; ?></td>
        <td><?php echo $rows['contacto']; ?></td>
        <td><?php echo $rows['data_nascimento']; ?></td>
        <td><?php echo $rows['cc']; ?></td>
        <td><?php echo $rows['sexo']; ?></td>
        <td class="modificar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modificar</td>
        <td class="excluir"><i class="fa fa-trash" aria-hidden="true"></i>Excluir</td>
</tr>
    <?php   
}
}else{
    echo "Nenhum utilizador encontrado";
}
?>