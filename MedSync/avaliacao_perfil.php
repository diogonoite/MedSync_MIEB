<html>
<link rel="stylesheet" type="text/css" href="./css/avaliacaoo.css">

<?php

if(isset($_GET['id'])){
    $id_perfil=$_GET['id'];
}
?>



<form id="barthel" action="#">

<h1>Escala de Barthel</h1>



<div class="tab"> 

<div class="col1_aval">
<p class="titulos_barthel">Alimentação:</p>
<p>0 = Incapacitado</p>
<p>5 = Precisa de ajuda para cortar, passar manteiga, etc</p>
<p>10 = Independente</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 

<div class="col1_aval">
<p class="titulos_barthel">Banho:</p>
<p>0 = Dependente</p>
<p>5 = Independente (ou no choveiro)</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>
</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Atividades rotineiras:</p>
<p>0 = Precisa de ajuda com a higiene pessoal</p>
<p>5 = Independente rosto/cabelo/dentes/barbear</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Vestir-se:</p>
<p>0 = Dependente</p>
<p>5 = Precisa de ajuda mas consegue fazer uma parte sozinho</p>
<p>10 = Independente (incluindo botões, zipers, laços, etc)</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Intestino:</p>
<p>0 = Incontinente (necessidade de anemas)</p>
<p>5 = Acidente ocasional</p>
<p>10 = Continente</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Sistema urinário:</p>
<p>0 = Incontinente</p>
<p>5 = Acidente ocasional</p>
<p>10 = Continente</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Uso de WC:</p> 
<p>0 = Dependente</p>
<p>5 = Precisa de alguma ajuda parcial</p>
<p>10 = Independente (pentear, limpar-se)</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Transferência (da cama para a cadeira e vice versa):</p> 
<p>0 = Incapacitado, sem equilíbiro para ficar sentado</p>
<p>5 = Muita ajuda (uma ou duas pessoas, física), pode sentar</p>
<p>10 = Pouca ajuda (verbal ou física)</p>
<p>15 = Independente</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Mobilidade (em superfícies planas):</p>
<p>0 = Imóvel ou menos de 50 metros </p>
<p>5 = Cadeira de rodas independente, incluindo esquinas, menos de 50 metros</p>
<p>10 = Caminha com a ajuda de uma pessoa (verbal ou física) menos de 50 metros</p>
<p>15 = Independente (mas pode precisar de alguma ajuda; como por exemplo de bengala, mais de 50 metros</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div class="tab"> 
<div class="col1_aval">
<p class="titulos_barthel">Escadas:</p>
<p>0 = Incapacitado</p>
<p>5 = Precisa de ajuda (verbal, física ou ser carregado)</p>
<p>10 = Independente</p>
</div>

<div class="col2_aval">
<p><input placeholder="introduza a pontuação" oninput="this.className=''" name=""></p>
</div>

</div>

<div style="overflow:auto;"> 
<div class="botoes_aval">
<button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
<button type="button" id="nextBtn" onclick="nextPrev(+1)">Next</button>
</div>
</div>

<div class="bolas_aval">
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
<span class="step"></span>
</div>


</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submeter";
  } else {
    document.getElementById("nextBtn").innerHTML = "Próximo";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function redirect(){
    window.alert('Avaliação submetida com sucesso');
    window.location.href="dashboard.php?operacao=utentes&id=<?php echo $id_perfil?>&sub=avaliar";
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("barthel").submit();
    redirect();
    return false;
    
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}
</script>

</html>