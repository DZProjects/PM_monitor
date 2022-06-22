<!DOCTYPE HTML>
<html lang="it">
<head>  
<title>Monitoraggio polveri sottili</title>
<meta charset="UTF-8">
<meta name="robots" content="index"/>
<meta name="author" content="Synclab">
<meta name="description" content="Sistema monitoraggio polveri sottili in veneto, misurazioni di PM 10 e PM2.5.">
<link rel="stylesheet" type="text/css" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Exo+2&display=swap" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="../../canvasjs.min.js"></script>
<style>
				.tg  {border-collapse:collapse;border-spacing:0;}
				.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
				  overflow:hidden;padding:12px 20px;word-break:normal;}
				.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
				  font-weight:normal;overflow:hidden;padding:12px 20px;word-break:normal;}
				.tg .tg-1wig{font-weight:bold;text-align:right;vertical-align:top;    border: none;}
				.tg .tg-zv36{background-color:#ffffff;border-color:black;font-weight:bold;text-align:right;vertical-align:top;    border: none;}
				.tg .tg-0lax{text-align:left;vertical-align:top}
				.tg .tg-c6of{background-color:#ffffff;border-color:black;text-align:left;vertical-align:top}
				.tg .tg-fymr{border-color:black;font-weight:bold;text-align:right;vertical-align:top;    border: none;}
				.tg .tg-0pky{border-color:black;text-align:left;vertical-align:top}
</style>

<!-- Libreria grafici -->
<script src="canvasjs.min.js"></script>
<script>
window.onload = function () {
var chart1 = new CanvasJS.Chart("chartContainer1", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "PM 2.5 - soglia limite 25 µg/m3 - 4gg",
		fontColor: "orange",
        fontFamily: "monospace"
	},
	axisY:{
		includeZero: false,
		stripLines:[
			{                
				value:25,
				label : "Soglia di concentrazione",
				thickness:4
			}
		],
		title: " µg/m3"
	},
	toolTip:{   
		content: "{label}   {y}µg/m3",
		fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints: [         
        <?php 
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);
			echo "{ label : \"".$p[0]." ore ".$p[1].":\", y:".$p[2]."},";
			}  
		?>
	]
	}]
});
//setColor2(chart1);
chart1.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "PM 10 - soglia limite 50 µg/m3 - 4gg",
		fontColor: "orange",
        fontFamily: "monospace"
	},
	axisY:{
		includeZero: false,
		stripLines:[
			{                
				value:50,
				label : "Soglia di concentrazione",
				thickness:4
			}
		],
		title: " µg/m3"
	},
		toolTip:{   
		content: "{label}   {y}µg/m3",
		fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints: [                 
		<?php
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);		
			echo "{ label : \"".$p[0]." ore ".$p[1].":\", y:".$p[3]."},";
			}  
		?>
	]
	}]
});
//setColor(chart2);
chart2.render();

var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "Temperatura   °C - 4gg ",
		fontColor: "orange",
        fontFamily: "monospace"
	},
	axisY:{
		includeZero: false,
		title: "Temperatura in °C"
	},
	toolTip:{   
		content: "{label}   {y}°C",
	fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints: [      
        <?php 
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);
			echo "{ label :\"".$p[0]." ore ".$p[1].":\", y:".$p[4]." },";
			}  
		?>
	]
	}]
});
chart3.render();

var chart4 = new CanvasJS.Chart("chartContainer4", {
		animationEnabled: true,
	theme: "light1",
	title:{
		text: "Umidità  % - 4gg",
			fontColor: "orange",
        fontFamily: "monospace"
	},
	axisY:{
		includeZero: false,
		title: "Umidità in %"
	},
	toolTip:{   
		content: "{label}   {y}%",
	fontColor: "blue"		
	},
	data: [{        
		type: "spline",       
		dataPoints:[                    
        <?php 
			foreach(file("dati_6gg.txt") as $riga){
			$p=explode(";",$riga);	
			echo "{ label: \"".$p[0]." ore ".$p[1].":\", y:".$p[5]." },";
			}  
		?>
	]
	}]
});
chart4.render();

var chart5 = new CanvasJS.Chart("chartContainer5", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "PM 2.5 - Giornaliero",
			fontColor: "orange",
        fontFamily: "monospace"
	},
	axisX: {
		 interval: 1,
		labelAngle: -65,
		labelFontSize: 13,
		labelMaxWidth: 70
	},
	axisY:{
		includeZero: false,
		stripLines:[
			{                
				value:25,
				label : "Soglia di concentrazione",
				thickness:4
			}
		],
		title: " µg/m3"
	},
	toolTip:{   
		content: "{label}   {y}µg/m3",
		fontColor: "blue"		
	},
	//width:900,
	data: [{        
		type: "column",       
		dataPoints: [         
        <?php 
			foreach(file("dati_today.txt") as $riga){
			$p=explode(";",$riga);
			echo "{ label : \"".$p[2]." µg/m3 ore:".$p[1]."\", y:".$p[2]."},";
			}  
		?>
	]
	}]
});

setColor2(chart5);
chart5.render()

var chart6 = new CanvasJS.Chart("chartContainer6", {
	animationEnabled: true,
	theme: "light1",
	title:{
		text: "PM 10 - Giornaliero",
			fontColor: "orange",
        fontFamily: "monospace"
	},
	axisX: {
		 interval: 1,
		labelAngle: -65,
		labelFontSize: 13,
		labelMaxWidth: 70
	},
	axisY:{
		includeZero: false,
		stripLines:[
			{                
				value:50,
				label : "Soglia di concentrazione",
				thickness:4
			}
		],
		title: " µg/m3"
	},
		toolTip:{   
		content: "{label}   {y}µg/m3",
		fontColor: "blue"		
	},
	//width:900,
	data: [{        
		type: "column",       
		dataPoints: [                 
		<?php
			foreach(file("dati_today.txt") as $riga){
			$p=explode(";",$riga);		
			echo "{ label : \"".$p[3]." µg/m3 ore:".$p[1]."\", y:".$p[3]."},";
			}  
		?>
	]
	}]
});


setColor(chart6);
chart6.render();

function setColor(chart){
	var countGreen = 0;
	var countOrange = 0;
	var countRed = 0;
	for(var i = 0; i < chart.options.data.length; i++) {
	dataSeries = chart.options.data[i];
	for(var j = 0; j < dataSeries.dataPoints.length; j++){
		/*Semaforo arancione*/
		if((dataSeries.dataPoints[j].y > 50) && (dataSeries.dataPoints[j].y <= 55)){
			countOrange = countOrange+1;
			dataSeries.dataPoints[j].color = '#E8B31A';
			dataSeries.dataPoints[j].lineColor="#E8B31A";
		}
		/*Semaforo rosso*/
		if(dataSeries.dataPoints[j].y > 55){
			countRed = countRed+1;
			dataSeries.dataPoints[j].color = '#E81A1A';
			dataSeries.dataPoints[j].lineColor="#E81A1A";
		}
		/*Semaforo verde*/
		if(dataSeries.dataPoints[j].y <= 50){
			countGreen = countGreen+1;
			dataSeries.dataPoints[j].color = '#4FFF33';
			dataSeries.dataPoints[j].lineColor="#4FFF33";
			
		}	
    }
  }
}


function setColor2(chart){
	for(var i = 0; i < chart.options.data.length; i++) {
  	dataSeries = chart.options.data[i];
  	for(var j = 0; j < dataSeries.dataPoints.length; j++){
		/*Semaforo arancione*/
    	if((dataSeries.dataPoints[j].y > 25) && (dataSeries.dataPoints[j].y <= 30))
      	dataSeries.dataPoints[j].color = '#E8B31A';
		/*Semaforo rosso*/
		if(dataSeries.dataPoints[j].y > 30)
      	dataSeries.dataPoints[j].color = '#E81A1A';
		/*Semaforo verde*/
		if(dataSeries.dataPoints[j].y < 25)
      	dataSeries.dataPoints[j].color = '#4FFF33';
    }
  }
}
}


</script>


</head>
<body>

<div   id="imageTitle" style="text-align:center;">	<img src="synclab_logo_blue.svg" alt="sesore polveri sottili" width="450" height="180" style="text-align:center;"></div>
<div   id="title" style="font-size:4em !important;FONT-FAMILY: monospace; COLOR: black; text-align:center;">Synclab PM Monitor</div>

<div id="sensorData"  style="
    margin-bottom: 10px;
    margin-top: 42px;
    text-align: center;
    font-family: system-ui;">		
<h1>Informazioni generali</h1>
	<h2>Soglie PM 2.5</h2>
<p>La soglia di concentrazione in aria delle polveri fini PM2.5 è stabilita dal D.Lgs. 155/2010 e calcolata su base temporale annuale. La caratterizzazione dei livelli di concentrazione in aria di PM2.5 nel Veneto al 2018 si è basata sul superamento, registrato presso le stazioni della rete regionale ARPAV della qualità dell’aria che misurano questo inquinante, del Valore Limite (VL) annuale per la protezione della salute umana pari a 25 μg/m3.</p>
	
	<h2>Soglie PM 10</h2>
	<p>
		Le soglie di concentrazione in aria delle polveri fini PM10 sono stabilite dal D.Lgs. 155/2010 e calcolate su base temporale giornaliera ed annuale. È stato registrato il numero di superamenti, 
		dal 2002 al 2018, presso le stazioni di monitoraggio della qualità dell’aria della rete regionale ARPAV, di due soglie di legge: Valore Limite (VL) annuale 
		per la protezione della salute umana di 40 μg/m3; Valore Limite (VL) giornaliero per la protezione della salute umana di 50 μg/m3 da non superare più di 35 volte/anno.</p>
</div>

<div id="notes"  style="font-family: sans-serif;text-align:center;">
	<h2>Caratteristiche sensore</h2>
	<div id = "image">
			<img src="sds011.png" alt="sesore polveri sottili" width="350" height="300">			
			<div id="space">&nbsp;</div>
			
				<table class="tg" style="margin-left: auto;margin-right: auto;">
				<thead>
				  <tr>
					<th class="tg-1wig">Produttore</th>
					<th class="tg-0lax">Nova PM</th>
					<th class="tg-0lax"></th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td class="tg-zv36">Modello</td>
					<td class="tg-c6of">SDS011</td>
					<td class="tg-0lax"></td>
				  </tr>
				  <tr>
					<td class="tg-zv36">Alimentazione</td>
					<td class="tg-c6of">5 Vcc</td>
					<td class="tg-0lax">(min. 4,7 Vcc - max 5,3 Vcc)</td>
				  </tr>
				  <tr>
					<td class="tg-fymr">Gamma di misura</td>
					<td class="tg-0pky">da 0,0 µg/m3 a 999,9 µg/m3</td>
					<td class="tg-0lax"></td>
				  </tr>
				  <tr>
					<td class="tg-zv36">Risoluzione</td>
					<td class="tg-c6of">0.3 μg/m3</td>
					<td class="tg-0lax"></td>
				  </tr>
				</tbody>
				</table>
			
	</div>
</div>

<div class="grafici" style= "margin-bottom:10px;margin-top:10px;">
	<!-- Contenitore grafico 2 -->
	<div id="chartContainer2" style="height: 470px; max-width: 1200px;  margin: 50px auto;"></div>
		
	<!-- Contenitore grafico 3 -->
	<div id="chartContainer3" style="height: 470px;  max-width: 1200px; margin: 50px auto;"></div>
	
	<!-- Contenitore grafico 4 -->
	<div id="chartContainer4" style="height: 470px; max-width: 1200px; margin: 50px auto;"></div>

	<!-- Contenitore grafico 5 -->
	<div id="chartContainer5" style="height: 470px; max-width: 1200px; margin: 30px auto ;"></div>
	
	<!-- Contenitore grafico 6 -->
	<div id="chartContainer6" style="height: 470px; max-width: 1200px; margin: 50px auto;"></div>
	
	<!-- Contenitore grafico 1 -->
	<div id="chartContainer1" style="height: 470px; max-width: 1200px;  margin: 50px auto;"></div>
	

</div>




<div id="validation" style="text-align:center !important;margin-bottom:10px;margin-top:10px;" >
<a href="https://validator.w3.org/check?uri=syncmonitor.altervista.org" target="_blank" rel="nofollow" title="Validate as HTML5">
<img src="W3C.png" alt="HTML VALIDATION" style="width:180px;height:82px;border-radius:25px;">
</a>
</div>


<!-- Footer -->
<div class="footer" style= "left: 0;bottom: 0; color: black;text-align: center; border-top-style:solid; border-top-color:black; border-top-width:thin; font-family: sans-serif ">
 <!-- Importazione mappa e video -->
<div id="gmaps" style="margin: 0px auto; text-align:center !important; margin-top:10px;">
	 <iframe src=		"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3460.8630669573504!2d12.047733315941448!3d45.59141397910264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDXCsDM1JzI5LjEiTiAxMsKwMDInNTkuNyJF!5e1!3m2!1sit!2sit!4v1585486709831!5m2!1sit!2sit" width="600" height="450" style="border:0; border-style: solid;
    border-width: thin; padding:0.5%;" allowfullscreen="">
	</iframe>
	<iframe  style="border:0; border-style: solid;
    border-width: thin; padding:0.5%;" width="600" height="450" src="https://www.youtube.com/embed/RnJLPw0FbCs" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
</div>
</body>

</html>
