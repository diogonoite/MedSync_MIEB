<html>
<link rel="stylesheet" type="text/css" href="./css/area_doente.css">

<div class="info"> 
 
        <p class="dshb">Submeter feedback (chat)</p>
    
</div>

<div class="feedback1" id="feedback_1">

<?php
include('connection_db.php');



$query2 = 'SELECT * FROM feedback WHERE id_utente="'.$_SESSION['utilizador'].'" ORDER by nr_mensagem ASC';
$query2_result = mysqli_query ($link ,$query2) or die('The query failed: ' . mysqli_error($link));


while($mensagens =mysqli_fetch_assoc($query2_result)){
    $data_formato_novo1 = date("d-m-Y", strtotime($mensagens['data_msg']));
if($mensagens['clinico']!=null){
echo '<div class="msg_clinico"><div class="msg_extra">('.$data_formato_novo1.') Clínico '.$mensagens['clinico'].':</div><div class="msg_txt">'.$mensagens['mensagem'].'</div></div>';

}else{
echo '<div class="msg_doente"><div class="msg_extra">('.$data_formato_novo1.') Eu:</div><div class="msg_txt">'.$mensagens['mensagem'].'</div></div>';
}

}

?>
<script>
    var scrollDiv = document.getElementById("feedback_1");
    scrollDiv.scrollTop = scrollDiv.scrollHeight;
</script>

</div>

<div class="feedback2">

<form method="POST">
<textarea name="mensagem" placeholder="Mensagem..."></textarea>

<button type="submit" name="submeter_feedback_doente">Submeter <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
</form>
<?php

if(isset($_POST['submeter_feedback_doente'])){

   date_default_timezone_set('Europe/Lisbon');
   $data = date('Y/m/d', time());
   $hora = date('H:i:s', time());

   $query1 = 'SELECT max(nr_mensagem) FROM feedback WHERE id_utente="'.$_SESSION['utilizador'].'"';
   $max_feedback_result = mysqli_query ($link ,$query1) or die('The query failed: ' . mysqli_error($link));
   $max_feedback= mysqli_fetch_row($max_feedback_result);
   $nr_feedback = $max_feedback[0]+1;

   $mensagem=$_POST['mensagem'];

$upload_feedback="INSERT INTO `feedback` (`id_utente`,`nr_mensagem`,`data_msg`,`hora_msg`,`mensagem`) VALUES('".$_SESSION['utilizador']."','$nr_feedback','$data','$hora','$mensagem')";
$result_upload = mysqli_query ($link ,$upload_feedback)
or die('The query failed: ' . mysqli_error($link));

echo '<script>window.location.href="dashboard_doente.php?operacao=feedback_doente";</script>';
      exit;
}
?>




</div>




</html>