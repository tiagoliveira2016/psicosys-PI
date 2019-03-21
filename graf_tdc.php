	<?php
            // require_once('./Class/class.gn_tabela.php');
            // require_once("fullcalendar/model/buscar.php");
            require_once("./header.php");
            require_once("./fullcalendar/model/buscar.php");
            makeHeather();
    ?>

    <html>
        <head>
            <meta charset="utf-8">
            <meta lang="pt-BR">
            <title> Indicador </title>
            <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
			<script src="https://www.amcharts.com/lib/3/serial.js"></script>
			<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
			<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
			<style>
				#chartdiv{
					height: 500px;
				}
				.well-white{
					background-color: white;
					box-shadow: 2px 2px 2px grey;
				}
			</style>
        </head>
