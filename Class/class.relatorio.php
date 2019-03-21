<?php

	require_once('class.gn_tabela.php');

	class relatorio extends gn_tabela{
		function __construct(){
			if($_POST['tprelatorio'] == 'geral')
				$this->geraRelatorio();
			elseif($_POST['tprelatorio'] == 'efetuadas')
				$this->relatorioEfetuadas();
			else
				$this->relatorioFaltas();
		}

		public function geraRelatorio(){

			// var_dump($_POST);
			$sql = 'SELECT start, end , prof.PROF_NOME, cli.CLI_NOME, conv.CONV_NOME , tpcons.CONS_DESC, tpcons.CONS_VALOR, ev.status 
					FROM tab_eventos ev
					inner join tab_clientes cli on CLI_ID = cli.CLI_COD
					inner join tab_profissionais prof on PROF_ID = prof.PROF_COD
					inner join tab_tpconsulta tpcons on ev.ID_TPCONSULTA = tpcons.CONS_COD
					inner join tab_convenios conv  on cli.CLI_CONVENIO = conv.CONV_COD 
					WHERE 1=1';
					
					
						

			/*$sql .= (isset($_POST['dataini']) ? " AND DATE_FORMAT(start, '%Y-m-d') >= '".$_POST['dataini']."'" : "");
			$sql .= (isset($_POST['datafim']) ? " AND DATE_FORMAT(end, '%Y-m-d')  <= '".$_POST['datafim']."'" : "");*/
			$sql .= (isset($_POST['dataini']) ? " AND DATE_FORMAT(start, '%Y-%m-%d') between '".$_POST['dataini']."' AND '".$_POST['datafim']."'" : "");

			
			$consultas =  $this->getAll($sql);
			

			$h = '';
			// $h = '<table class="table">'	
				// $arr = array($key=>$value);
			// echo"<pre>";
			// var_dump($consultas);
			// echo"</pre>";
			$sts = '';
			foreach ($consultas as $key => $value) {
				// print_r($value['status']);
				if($value['status'] == 'A')
					$sts = 'ABERTO';
				elseif($value['status'] == 'C')
					$sts = 'EFETUADO';
				if($value['status'] == 'F')
					$sts = 'FALTA';
				if($value['status'] == 'D')
					$sts = 'DESISTENTE';
				
				$h .= '<tr>
							<td>'.$value["PROF_NOME"].'</td>
							<td>'.$value["CLI_NOME"].'</td>
							<td>'.$value["CONV_NOME"].'</td>
							<td>'.date( 'd/m/Y', strtotime( $value["start"] ) ).'</td>
							<td>'.$value["CONS_DESC"].'</td>
							<td>'.$value["CONS_VALOR"].'</td>
							<td>'.$sts.'</td>
							

						</tr>	
						';
			}
			$html = '';
			
			$html .= $this->body($h,'Relatório Geral');
			require_once('relatorio.php');
			echo $html;
		}

		public function relatorioEfetuadas(){

			// var_dump($_POST);
			$sql = 'SELECT start, end , prof.PROF_NOME, cli.CLI_NOME, conv.CONV_NOME , tpcons.CONS_DESC, tpcons.CONS_VALOR, ev.status  
					FROM tab_eventos ev
					inner join tab_clientes cli on CLI_ID = cli.CLI_COD
					inner join tab_profissionais prof on PROF_ID = prof.PROF_COD
					inner join tab_tpconsulta tpcons on ev.ID_TPCONSULTA = tpcons.CONS_COD
					inner join tab_convenios conv  on cli.CLI_CONVENIO = conv.CONV_COD 
					WHERE 1=1
					AND ev.status="C"
					';

			/*$sql .= (isset($_POST['dataini']) ? " AND DATE_FORMAT(start, '%Y-m-d') >= '".$_POST['dataini']."'" : "");
			$sql .= (isset($_POST['datafim']) ? " AND DATE_FORMAT(end, '%Y-m-d')  <= '".$_POST['datafim']."'" : "");*/
			$sql .= (isset($_POST['dataini']) ? " AND DATE_FORMAT(start, '%Y-%m-%d') between '".$_POST['dataini']."' AND '".$_POST['datafim']."'" : "");

			
			$consultas =  $this->getAll($sql);
			

			$h = '';
			$somaVal = 0;
			foreach ($consultas as $key => $value) {
				if($value['status'] == 'A')
					$sts = 'ABERTO';
				elseif($value['status'] == 'C')
					$sts = 'EFETUADO';
				if($value['status'] == 'F')
					$sts = 'FALTA';
				if($value['status'] == 'D')
					$sts = 'DESISTENTE';
				$h .= '<tr>
							<td>'.$value["PROF_NOME"].'</td>
							<td>'.$value["CLI_NOME"].'</td>
							<td>'.$value["CONV_NOME"].'</td>
							<td>'.date( 'd/m/Y', strtotime( $value["start"] ) ).'</td>
							<td>'.$value["CONS_DESC"].'</td>
							<td>'.$value["CONS_VALOR"].'</td>
							<td>'.$sts.'</td>

						</tr>	
						';

				$somaVal += $value['CONS_VALOR'];
			}

			$footer = '<tfooter ><td colspan="5" align="right" style="background-color:#d5d7d9"><b>Total Arrecadado:</b></td><td colspan="2" style="background-color:#d5d7d9"> <b>R$ '.number_format($somaVal, 2, '.', ',').'</b></td></tfooter>';
			$html = '';
			
			$html .= $this->body($h, 'Relatório de Consultas Efetuadas',$footer);
			require_once('relatorio.php');
			echo $html;
		}
		
		public function relatorioFaltas(){

			// var_dump($_POST);
			$sql = 'SELECT start, end , prof.PROF_NOME, cli.CLI_NOME, conv.CONV_NOME , tpcons.CONS_DESC, tpcons.CONS_VALOR ,ev.status 
					FROM tab_eventos ev
					inner join tab_clientes cli on CLI_ID = cli.CLI_COD
					inner join tab_profissionais prof on PROF_ID = prof.PROF_COD
					inner join tab_tpconsulta tpcons on ev.ID_TPCONSULTA = tpcons.CONS_COD
					inner join tab_convenios conv  on cli.CLI_CONVENIO = conv.CONV_COD 
					WHERE 1=1
					AND ev.status="F" or ev.status = "D"
					';

			/*$sql .= (isset($_POST['dataini']) ? " AND DATE_FORMAT(start, '%Y-m-d') >= '".$_POST['dataini']."'" : "");
			$sql .= (isset($_POST['datafim']) ? " AND DATE_FORMAT(end, '%Y-m-d')  <= '".$_POST['datafim']."'" : "");*/
			$sql .= (isset($_POST['dataini']) ? " AND DATE_FORMAT(start, '%Y-%m-%d') between '".$_POST['dataini']."' AND '".$_POST['datafim']."'" : "");

			
			$consultas =  $this->getAll($sql);
			

			$h = '';
			
			foreach ($consultas as $key => $value) {
				if($value['status'] == 'A')
					$sts = 'ABERTO';
				elseif($value['status'] == 'C')
					$sts = 'EFETUADO';
				if($value['status'] == 'F')
					$sts = 'FALTA';
				if($value['status'] == 'D')
					$sts = 'DESISTENTE';
				$h .= '<tr>
							<td>'.$value["PROF_NOME"].'</td>
							<td>'.$value["CLI_NOME"].'</td>
							<td>'.$value["CONV_NOME"].'</td>
							<td>'.date( 'd/m/Y', strtotime( $value["start"] ) ).'</td>
							<td>'.$value["CONS_DESC"].'</td>
							<td>'.$value["CONS_VALOR"].'</td>
							<td>'.$sts.'</td>

						</tr>	
						';
			}
			$html = '';
			
			$html .= $this->body($h, 'Relatório de Faltas e Desistências');
			require_once('relatorio.php');
			echo $html;
		}
		

		public function body($table,$title,$footer = ''){
			$html = '  <body>
							<div class="container" style="font-size:20px" align="center" > '.$title.' </div>
							<table class="table " id="consultar" >
								<thead style="font-size: 13px; background: #005C97;  /* fallback for old browsers */
                        background: -webkit-linear-gradient(to right, #363795, #005C97);  /* Chrome 10-25, Safari 5.1-6 */
                        background: linear-gradient(to right, #363795, #005C97); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */;color:white;">
									<th>Profissional</th>
									<th>Cliente</th>
									<th>Convênio</th>
									<th>Data</th>
									<th>Tipo Consulta</th>
									<th>Valor Consulta</th>
									<th>Status</th>
								</thead>
								<tbody>
      								%teste%
      							</tbody>
      							'.(!empty($footer) ? $footer : "").'
							</table>   
    					</body>';
		
			$ht2 = str_replace('%teste%' , $table , $html);
			$ht3 = str_replace('%teste%' , '' , $ht2);


			return $ht3;

		}
	
	}