<?php
	require_once('class.gn_tabela.php');

	class indicador_tdc extends gn_tabela{
		function __construct(){

		}

		public function indicador(){
			$qry = '';

			if($_POST['tipo'] == 'D'){
				$dtini = implode('/', array_reverse((explode('-', $_POST['dataini']))));
				$dtfim = implode('/', array_reverse((explode('-', $_POST['datafim']))));;
				$qry = "select 
							count(a.ID_TPCONSULTA) as TPC,
							date_format(a.`start`, '%d/%m/%Y') label,
							'#7fa7ff' as color
						from tab_eventos a
						where date_format(a.`start`, '%d/%m/%Y') between '".$dtini."' and '".$dtfim."'";

					if($_POST['status'] == 'D')
						$qry .= "and a.status = 'D' or a.status = 'F'";
					elseif($_POST['status'] == 'T')
						$qry .= "and a.status != 'TUDO'";
					else
						$qry .=	"and a.status = '".$_POST['status']."'";
				
				$qry .= "group by date_format(a.`start`, '%d/%m/%Y')";	

			} else {

				$dti = explode('-', $_POST['dataini']);
				$dtf = explode('-', $_POST['datafim']);
				$dtini = $dti[1];
				$dtfim = $dtf[1];

				$qry = "select 
							count(a.ID_TPCONSULTA) as TPC,
							date_format(a.`start`, '%m') label,
							'#7fa7ff' as color
						from tab_eventos a
						where date_format(a.`start`, '%m') between '".$dtini."' and '".$dtfim."'
						group by date_format(a.`start`, '%m')";
			}
			

			$consultas =  $this->getAll($qry);
			$html = $this->createHtml($consultas);
			require_once('graf_tdc.php');
			echo $html;
		}

		public function createHtml($arr){
			$arr = json_encode($arr);
			$html = '<script>
						var chart = AmCharts.makeChart("chartdiv", {
						  	"type": "serial",
						  	"theme": "none",
						  	"autoMargins": true,
						  	"marginBottom": 30,
						  	"marginTop": 40,
						  	"marginRight": 30,
						  	"dataProvider": %DADOS%,
						  	"valueAxes": [{
						    	"axisAlpha": 0
						  	}],
						  	"startDuration": 1,
						  	"graphs": [{
						    	"balloonText": "<b>[[category]]: [[value]]</b>",
						    	"fillAlphas": 0.9,
						    	"lineAlpha": 0.2,
						    	"type": "column",
						    	"valueField": "TPC",
						    	"colorField": "color",
						    	"labelText": "[[value]]"
						  	}],
						  	"categoryField": "label",
						  	"categoryAxis": {
						    	"gridPosition": "start",
						    	"labelRotation": 0
						  	},
						  	"export": {
							    "enabled": true
						  	},
						  	"titles": [
								{
									"text": "Quantidades de Consultas",
									"size": 15
								}
							]

						});
					</script>
					<body>
						<div class="container-fluid">
							<div class="well well-white">
								<div id="chartdiv"></div>
							</div>
						</div>
					</body>
					</html>';

			$ht2 = str_replace('%DADOS%' , $arr, $html);
			return $ht2;
		}
	}