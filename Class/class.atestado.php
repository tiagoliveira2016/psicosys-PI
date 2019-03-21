<?php

	require_once('class.gn_tabela.php');

	class atestado extends gn_tabela{
		function __construct(){
			$this->geraAtestado();
		}
		
		public function geraAtestado(){
			require_once('./lib/FPDF/fpdf.php');
			$cod_cli = $_POST['cliente'];

			//busca o cliente
			$sql = 'SELECT * FROM tab_CLIENTES WHERE CLI_COD = '.$cod_cli;
			$paciente =  $this->executarNoBanco($sql);
			
			$p = $this->transforma($paciente);
			// $p = '';
			
			
			// echo $p;
			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->Cell(35,12,'',0,0,'C');
			$pdf->Image('./img/logo_Psicosys.png',15,10,25);
			$pdf->SetFont('Arial','B',16);
			$pdf->setXY(70,10);
			$pdf->Cell(90,12,'ATESTADO MÉDICO',0,1,'C');
			
			$pdf->setXY(10,35);
			$pdf->Cell(190,0,'',1,1,'C');
			
			$pdf->setY(70);
			$pdf->SetFont('Arial','',12);
			// $pdf->MultiCell(170,15,'Atesto para os devidos fins que o Sr(a) '.$p['CLI_NOME'],0,0,0,'C');
			$pdf->Cell(190,15,'Atesto para os devidos fins que o Sr(a) '.utf8_decode($p['CLI_NOME']),0,1,'C');
			// $pdf->setX(15);
			$pdf->Cell(190,16,'portador do CPF:  '.$p['CLI_CPF'].' compareceu a esta clínica para realização',0,1,'C');
			// $pdf->setXY(20,80);
			$pdf->Cell(190,15,' de consulta psicológicas na data: '.date('d/m/Y'),0,1,'C');

			$pdf->setXY(20,150);
			$pdf->Cell(190,15,'CID: ____________________________',0,1,'L');			
			$pdf->setY(200);
			$pdf->Cell(190,15,'_____________________________________',0,1,'C');			
			$pdf->Cell(190,15,'Assinatura e Carimbo',0,1,'C');		

			$pdf->setY(260);
			$pdf->Cell(190,0,'',1,1,'C');
			$pdf->setY(266);
			$pdf->SetTextColor(137,137,137);
			$pdf->Cell(190,0,'Endereço: R. Des. Westphalen, 289 - Centro, Curitiba - PR, 80010-110',0,1,'C');
			$pdf->setY(271);
			$pdf->Cell(190,0,'Telefone: (41) 3324-1014',0,1,'C');	
			$pdf->setY(276);
			$pdf->Cell(190,0,'www.psicosys.com.br',0,1,'C');		
			$pdf->Output();

		}


// 		Endereço: R. Des. Westphalen, 289 - Centro, Curitiba - PR, 80010-110
// Telefone: (41) 3324-1014
	}