$(function(){
$("#pesquisa").keyup(function(){

    var pesquisa = $(this).val();

    //verificar se tem texto

    if(pesquisa !=''){
        var dados = {
            palavra : pesquisa
        } 
    $.post('busca.php',dados, function (retorna){
        //mostra resultados obtidos
        $(".dados_lista").html(retorna);
    });
    }else{
        $(".dados_lista").html('');
        }
    });
});