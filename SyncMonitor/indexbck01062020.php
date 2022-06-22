<!DOCTYPE HTML>
<html>
<head>  
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="../../canvasjs.min.js"></script>
<script>

window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Valori PM 2.5 "
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
                           
            <?php 
			// http://chalinux.addns.org:3128/centralina/dati_2020.txt
			foreach(file("dati_2020.txt") as $riga){
			$p=explode(";",$riga);
			echo "{";
			echo " label: \"".$p[0]."h".$p[1]."\",";
					
						

			echo " y:".$p[2];
			    
			
			    echo " },";
			}  ?>


	]
	}]
});
chart.render();


var chart = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Valori PM 10 "
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
                           
<?php

			foreach(file("dati_2020.txt") as $riga){
			$p=explode(";",$riga);
			
			echo "{ label : \"".$p[0]."h".$p[1]."\", y:".$p[3]." },";
			
			}  ?>


	]
	}]
});
chart.render();


var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Valori Temperatura "
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
                           
                        <?php 
			foreach(file("dati_2020.txt") as $riga){
			$p=explode(";",$riga);
						
			
			    echo "{ label :\"".$p[0]."h".$p[1]."\", y:".$p[4]." },";
			
			}  ?>


	]
	}]
});
chart.render();


var chart = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Valori Umidità"
	},
	axisY:{
		includeZero: false
	},
	data: [{        
		type: "line",       
		dataPoints: [
                           
                        <?php 
			foreach(file("dati_2020.txt") as $riga){
			$p=explode(";",$riga);
			
			    echo "{ label: \"".$p[0]."h".$p[1]."\", y:".$p[5]." },";
			
			}  ?>


	]
	}]
});
chart.render();

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


<!-- Div grafico 1 si collega al grafico sopra -->
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<!-- Div grafico 2 si collega al grafico sopra -->
<div id="chartContainer1" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<!-- Div grafico 3 si collega al grafico sopra -->
<div id="chartContainer2" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<!-- Div grafico 4 si collega al grafico sopra -->
<div id="chartContainer3" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>

<script src="canvasjs.min.js"></script>

</body>
</html>
