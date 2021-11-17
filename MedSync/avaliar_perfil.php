<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">


<?php
 
if(isset($_POST['confirmar_aval_barthel'])==true){
    $id_perfil=$_GET['id'];

    // $link = mysqli_connect('localhost', 'root', 'root','medsync')
    // or die('Error connecting to the server: ' . mysqli_error($link));

    include('connection_db.php');

    $nr_query = "select max(nr_aval) from avaliacao_barthel where id_barthel=$id_perfil";
    $aval_result = mysqli_query($link,$nr_query);
    $numer_aval = mysqli_fetch_row($aval_result);
    $nr_avaliacao = $numer_aval[0]+1;
    $score = $_POST['alimentacao']+$_POST['banho']+$_POST['atividades']+$_POST['vestir']+$_POST['intestino']+$_POST['urinario']+$_POST['wc']+$_POST['transferencia']+$_POST['mobilidade']+$_POST['escadas'];
    
    date_default_timezone_set('Europe/Lisbon');
    $date = date('Y/m/d', time());
    
    
    $inserir_aval = 'INSERT INTO `avaliacao_barthel`(`id_barthel`,`nr_aval`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `comentario_barthel`,`score`,`data`) VALUES ("'.$id_perfil.'","'.$nr_avaliacao.'","'.$_POST['alimentacao'].'","'.$_POST['banho'].'","'.$_POST['atividades'].'","'.$_POST['vestir'].'","'.$_POST['intestino'].'","'.$_POST['urinario'].'","'.$_POST['wc'].'","'.$_POST['transferencia'].'","'.$_POST['mobilidade'].'","'.$_POST['escadas'].'","'.$_POST['comentario'].'","'.$score.'","'.$date.'")';
$result_barthel = mysqli_query ($link ,$inserir_aval)
or die('The query failed: ' . mysqli_error($link));
}

?>

<!-- <a href="#"> <img class="avli" src="./img/chart_icone.png"></a> -->


<form method="POST" action="#" class="form_avaliar">
<div class="form1">
<label for="fname">Alimentação</label>
  <select name="alimentacao" required>
    <option value="">Selecione</option>
    <option value="0">0 = Incapacitado</option>
    <option value="5">5 = Precisa de ajuda para cortar, passar manteiga, etc</option>
    <option value="10">10 = Independente</option>
  </select> 

<p>
  <label for="lname">Banho</label>
  <select name="banho" required>
    <option value="">Selecione</option>
    <option value="0">0 = Dependente</option>
    <option value="5">5 = Independente</option>
  </select>
</p>

<p>
  <label for="lname">Atividades rotineiras</label>
  <select name="atividades" required>
    <option value="">Selecione</option>
    <option value="0">0 = Precisa de ajuda com a higiene pessoal</option>
    <option value="5">5 = Independente rosto/cabelo/dentes/barbear</option>
  </select>
</p>

<p>
  <label for="lname">Vestir-se</label>
  <select name="vestir" required>
    <option value="">Selecione</option>
    <option value="0">0 = Dependente</option>
    <option value="5">5 = Precisa de ajuda mas consegue fazer uma parte sozinho</option>
    <option value="10">10 = Independente (incluindo botões, zipers, laços, etc)</option>
  </select>
</p>

<p>
  <label for="lname">Intestino</label>
  <select name="intestino" required>
    <option value="">Selecione</option>
    <option value="0">0 = Incontinente (necessidade de anemas)</option>
    <option value="5">5 = Acidente ocasional</option>
    <option value="10">10 = Funcional</option>
  </select>
</p>

</div>

<div class="form2">
<p>
  <label for="lname">Sistema urinário</label>
  <select name="urinario" required>
    <option value="">Selecione</option>
    <option value="0">0 = Incontinente</option>
    <option value="5">5 = Acidente ocasional</option>
    <option value="10">10 = Funcional</option>
  </select>
</p>

<p>
  <label for="lname">Uso de WC</label>
  <select name="wc" required>
    <option value="">Selecione</option>
    <option value="0">0 = Dependente</option>
    <option value="5">5 = Precisa de alguma ajuda parcial</option>
    <option value="10">10 = Independente (pentear, limpar-se)</option>
  </select>
</p>

<p>
  <label for="lname">Transferência ( cama <-> cadeira)</label>
  <select name="transferencia" required>
    <option value="">Selecione</option>
    <option value="0">0 = Incapacitado, sem equilíbiro para ficar sentado</option>
    <option value="5">5 = Muita ajuda (uma ou duas pessoas, física), pode sentar</option>
    <option value="10">10 = Pouca ajuda (verbal ou física)</option>
    <option value="15">15 = Independente</option>
  </select>
</p>

<p>
  <label for="lname">Mobilidade (em superfícies planas)</label>
  <select name="mobilidade" required>
    <option value="">Selecione</option>
    <option value="0">0 = Imóvel ou menos de 50 metros</option>
    <option value="5">5 = Cadeira de rodas independente, incluindo esquinas, menos de 50 metros</option>
    <option value="10">10 = Caminha com a ajuda de uma pessoa (verbal ou física) menos de 50 metros</option>
    <option value="15">15 = Independente (mas pode precisar de alguma ajuda; como por exemplo de bengala, mais de 50 metros</option>
  </select>
</p>

<p>
  <label for="lname">Escadas</label>
  <select name="escadas" required>
    <option value="">Selecione </option>
    <option value="0">0 = Incapacitado</option>
    <option value="5">5 = Precisa de ajuda (verbal, física ou ser carregado)</option>
    <option value="10">10 = Independente</option>
  </select>
</p>
</div>

<div class="notas_form">
<p>
Notas adicionais
<textarea rows="4" cols="50" name="comentario"></textarea>
</p>

<input value="Submeter" type="submit" name="confirmar_aval_barthel" onclick="return confirm('Deseja submeter o formulário?')">
</div>

</form>

</html>