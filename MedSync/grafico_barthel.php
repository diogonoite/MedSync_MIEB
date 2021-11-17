<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

google.charts.load('current',{'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart(){

    var data = google.visualization.arrayToDataTable([
        ['Aval','Score'],

<?php

// $link = mysqli_connect('localhost', 'root', 'root','medsync')
// or die('Error connecting to the server: ' . mysqli_error($link));

include('connection_db.php');

$id_perfil=$_GET['id'];

    $nr_query = "select max(nr_aval) from avaliacao_barthel where id_barthel=$id_perfil";
    $aval_result = mysqli_query($link,$nr_query);
    $numer_aval = mysqli_fetch_row($aval_result);
    $x_ax= $numer_aval[0];


$graf_query = "select * from avaliacao_barthel where id_barthel=$id_perfil";
$graf_result = mysqli_query($link,$graf_query);
while($data=mysqli_fetch_array($graf_result)){
    $aval=$data['data'];
    $score=$data['score'];

    ?>
    ['<?php echo $aval;?>',<?php echo $score;?>],
    <?php
}
?>
    ]);

    var options = {
        series: { 0: { color: "#8D0A03", pointSize: 10, lineWidth: 3 }},
        curveType: 'function',
        legend: { 
            position:'top',
        textStyle: {
                color: '#8D0A03'
            }
        },
        backgroundColor: 'transparent',
    vAxis: {
        viewWindow: {
        min: 0,
        max: 108
        },
        gridlines: {
        color: 'none'
    },
        textStyle:{color: '#FFF'},
        titleTextStyle: { color: '#FFF',
        fontSize:'16'},
        title: "Score total"
    },

    hAxis: {
        viewWindow: {
        min: 0,
        max:<?php echo $x_ax;?>
        },
        title: "Data da avaliação",
        titleTextStyle: { color: '#FFF',
        fontSize:'16'},
        textStyle:{color: '#FFF'}
    }


    };

    var chart = new google.visualization.LineChart(document.getElementById('grafico_barthel'));

    chart.draw(data, options);

}

</script>


<div id="grafico_barthel">
</div>

</html>