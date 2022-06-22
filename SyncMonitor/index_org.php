<!DOCTYPE HTML>
<html>
<head>  
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="../../canvasjs.min.js"></script>
<script>

<!-- Funzione di creazione del grafico -->
<!-- Utilizzo delle librerie Canvas JS -->
window.onload = function () {
	
	/*Grafico 1*/
	var chart = new CanvasJS.Chart("chartContainer",
	{
		title: {
			text: "Monitor PM 2.5"
		},
		axisX: {
			labelFormatter: function (e) {
				return CanvasJS.formatDate( e.value, "DD MMM");
			},
		},
		axisY: {
			title: "PM 2.5 Giornaliero - µg/m³",
		},
		data: [
		{
			type: "spline",
			dataPoints: [
				{ x: new Date(2010, 0, 3), y: 50 },
				{ x: new Date(2010, 0, 5), y: 100 },
				{ x: new Date(2010, 0, 7), y: 110 },
				{ x: new Date(2010, 0, 9), y: 158 },
				{ x: new Date(2010, 0, 11), y: 34 },
				{ x: new Date(2010, 0, 13), y: 363 },
				{ x: new Date(2010, 0, 15), y: 247 },
				{ x: new Date(2010, 0, 17), y: 253 },
				{ x: new Date(2010, 0, 19), y: 269 },
				{ x: new Date(2010, 0, 21), y: 343 },
				{ x: new Date(2010, 0, 23), y: 370 }
			]
		}
		]                      
	});

	/*Grafico 2*/
	var chart2 = new CanvasJS.Chart("chartContainer2",
	{
		title: {
			text: "Monitor PM 10"
		},
		axisX: {
			title: "PM 10 Giornaliero - µg/m³",
			labelFormatter: function (e) {
				return CanvasJS.formatDate( e.value, "DD MMM");
			},
		},
		axisY: {
			title: "PM 2.5 Giornaliero - µg/m³",
		},
		data: [
		{
			type: "spline",
			dataPoints: [
				{ x: new Date(2010, 0, 3), y: 50 },
				{ x: new Date(2010, 0, 5), y: 100 },
				{ x: new Date(2010, 0, 7), y: 110 },
				{ x: new Date(2010, 0, 9), y: 158 },
				{ x: new Date(2010, 0, 11), y: 34 },
				{ x: new Date(2010, 0, 13), y: 363 },
				{ x: new Date(2010, 0, 15), y: 247 },
				{ x: new Date(2010, 0, 17), y: 253 },
				{ x: new Date(2010, 0, 19), y: 269 },
				{ x: new Date(2010, 0, 21), y: 343 },
				{ x: new Date(2010, 0, 23), y: 370 }
			]
		}
		]                      
	});

    chart.render();
    chart2.render();

    document.getElementById("update").addEventListener("click", function(e) {
        var a = document.getElementById("dataSeries1").value;
        for (i = 0; i < 11; i++) {
            chart.data[0].dataPoints[i].y = parseFloat(a);
        }
        chart.render();
    });

    document.getElementById("update2").addEventListener("click", function(e) {
        var a = document.getElementById("dataSeries2").value;
        for (i = 0; i < 11; i++) {
            chart2.data[0].dataPoints[i].y = parseFloat(a);
        }
        chart2.render();
    });


    $(document).ready(function(){   
        cleanit = setInterval ( "cleaning()", 150000 );
    });

    function cleaning(){
        if($('#frametest').contents().find('.selector').html() == "body"){
            alert("Body iframe trovato");
            clearInterval(cleanit);
            $('#selector').contents().find('.Link').html('ideate tech');
        }
	}
}
</script>

</head>
<body>

<div id="title" style="font-family: 'Exo 2', sans-serif; font-size:5em !important">PM MONITOR</div>
</br>
</br>

<!-- Importazione mappa da google maps -->
<div id="gmaps" style="height: 460px; margin: 0px auto; text-align:center !important;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3460.8630669573504!2d12.047733315941448!3d45.59141397910264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDXCsDM1JzI5LjEiTiAxMsKwMDInNTkuNyJF!5e1!3m2!1sit!2sit!4v1585486709831!5m2!1sit!2sit" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</div>

<!-- Acquisizione sensore -->
<div id="sensore" style="height: 550px; margin: 0px auto; text-align:center !important;">
    <!--<iframe id="sensorIframe" src='http://chalinux.addns.org/values' width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>-->
    
	<!-- Attraverso una funzione php interrogo la pagina contenente i dati del sensore ed estraggo i valori 
	che popolano le variabili $valuePM_1 e $valuePM_2-->
	<?php
        include_once('simple_html_dom.php');
        function get_string_between($string, $start, $end){
            $string = ' ' . $string;
            $ini = strpos($string, $start);
            if ($ini == 0) return '';
                $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            return substr($string, $ini, $len);
        }
        $url = "http://chalinux.addns.org/values";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $output = curl_exec($curl);
        curl_close($curl);
        $file2 = 'sens.txt';
        file_put_contents($file2, $output);
        $contents = file_get_contents('sens.txt');
        echo $contents;
        $word1="<td>PM2.5</td><td class='r'>";
        $word2="&nbsp;µg/m³";
        $word3="<td>PM10</td><td class='r'>";
        $word4="&nbsp;µg/m³";
        $between2= get_string_between($contents,"<td>PM10</td><td class='r'>","&nbsp;µg/m³");
        $between = get_string_between($contents,"<td>PM2.5</td><td class='r'>","&nbsp;µg/m³");
        $valuePM_1 = $between;
        $valuePM_2 = $between2;
    ?>
</div>


<!-- Div grafico 1 si collega al grafico sopra -->
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<!-- Pulsante aggiornamento valori grafico 1 -->
<div class = "button">
    <input type="number" id="dataSeries1" value="<? echo $valuePM_1 ?>" readonly><br>
    <button id="update">Aggiorna valori</button>
</div>

<!-- Div grafico 2 si collega al grafico sopra -->
<div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<!-- Pulsante aggiornamento valori grafico 2 -->
<div class = "button">
    <input type="number" id="dataSeries2" value="<? echo $valuePM_2 ?>" readonly><br>
    <button id="update2">Aggiorna valori</button>
</div>

<!-- Importazione video -->
<div id="norms1" style="height: 460px; margin: 0px auto; text-align:center !important;"> 
<iframe  width="560" height="315" src="https://www.youtube.com/embed/RnJLPw0FbCs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
</iframe>
</div>


<!-- Ogni 150 secondi interrogo la pagina del sensore per avere i dati aggiornati -->
<script>
    window.setInterval("reloadIFrame();", 150000);
    function reloadIFrame() {
        alert("Aggiornamento dati sensore - premere OK");
        document.getElementById("sensorIframe").src="http://chalinux.addns.org/values";
    }
</script>


</body>
</html>
