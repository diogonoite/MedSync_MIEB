<html>
<link rel="stylesheet" type="text/css" href="./css/perfill.css">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

<script type="text/javascript">

google.charts.load('current',{'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
 google.load('visualization', '1', {packages: ['corechart']});
function drawChart(){

    var data = google.visualization.arrayToDataTable([
        ['Aval','Alimentação (máx:10)','Banho (máx:5)','A.rotineiras (máx:5)','Vestir-se (máx:10)','Intestino (máx:10)',
        'S. urinário (máx:10)','WC (máx:10)','Transferência (máx:15)','Mobilidade (máx:15)','Escadas (máx:10)'],

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
    $score1=$data['1'];
    $score2=$data['2'];
    $score3=$data['3'];
    $score4=$data['4'];
    $score5=$data['5'];
    $score6=$data['6'];
    $score7=$data['7'];
    $score8=$data['8'];
    $score9=$data['9'];
    $score10=$data['10'];
    ?>
    ['<?php echo $aval;?>',<?php echo $score1;?>,<?php echo $score2;?>,<?php echo $score3;?>,<?php echo $score4;?>,<?php echo $score5;?>,
    <?php echo $score6;?>,<?php echo $score7;?>,<?php echo $score8;?>,<?php echo $score9;?>,<?php echo $score10;?>],
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
                color: '#FFFFFF'
            }
        },
        backgroundColor: 'transparent',
    vAxis: {
        viewWindow: {
        min: 0,
        max: 17
        },
        ticks: [5,10,15],
        gridlines: {
        color: 'none'
    },
        textStyle:{color: '#FFF'},
        titleTextStyle: { color: '#FFF',
        fontSize:'16'},
        title: "Score"
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

data.addColumn({type: 'string', role: 'annotation'});
            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                { calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation" },2,
                { calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation" },3,
                    { calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation" },4,
                { calc: "stringify",
                    sourceColumn: 4,
                    type: "string",
                    role: "annotation" },5,
                { calc: "stringify",
                    sourceColumn: 5,
                    type: "string",
                    role: "annotation" },6,
                { calc: "stringify",
                    sourceColumn: 6,
                    type: "string",
                    role: "annotation" },7,
                { calc: "stringify",
                    sourceColumn: 7,
                    type: "string",
                    role: "annotation" },8,
                { calc: "stringify",
                    sourceColumn: 8,
                    type: "string",
                    role: "annotation" },9,
                { calc: "stringify",
                    sourceColumn: 9,
                    type: "string",
                    role: "annotation" },10,
                { calc: "stringify",
                    sourceColumn: 10,
                    type: "string",
                    role: "annotation" }
                    ]);

    var chart = new google.visualization.LineChart(document.getElementById('grafico_barthel_especifico'));

    
    chart.draw(view, options);
                    $(document).ready(function () {
                // do stuff on "ready" event
                $(".checkbox").change(function() {

                    view = new google.visualization.DataView(data);
                    var tes =[0];

                    if($("#kolom1").is(':checked')) {

                        tes.push(1,
                            { calc: "stringify",
                                sourceColumn: 1,
                                type: "string",
                                role: "annotation" });                    }
                    if($("#kolom2").is(':checked'))
                    {
                        tes.push(2,
                            { calc: "stringify",
                                sourceColumn: 2,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom3").is(':checked'))
                    {
                        tes.push(3,
                            { calc: "stringify",
                                sourceColumn: 3,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom4").is(':checked'))
                    {
                        tes.push(4,
                            { calc: "stringify",
                                sourceColumn: 4,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom5").is(':checked'))
                    {
                        tes.push(5,
                            { calc: "stringify",
                                sourceColumn: 5,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom6").is(':checked'))
                    {
                        tes.push(6,
                            { calc: "stringify",
                                sourceColumn: 6,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom7").is(':checked'))
                    {
                        tes.push(7,
                            { calc: "stringify",
                                sourceColumn: 7,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom8").is(':checked'))
                    {
                        tes.push(8,
                            { calc: "stringify",
                                sourceColumn: 8,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom9").is(':checked'))
                    {
                        tes.push(9,
                            { calc: "stringify",
                                sourceColumn: 9,
                                type: "string",
                                role: "annotation" });
                    }
                    if($("#kolom10").is(':checked'))
                    {
                        tes.push(10,
                            { calc: "stringify",
                                sourceColumn: 10,
                                type: "string",
                                role: "annotation" });
                    }
                    view.setColumns(tes);

                    chart.draw(view, options);

                });
            });

}

</script>

<div id="grafico_barthel_especifico"></div>
</html>