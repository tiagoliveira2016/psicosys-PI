<?php
	
	//Conectando ao banco de dados
    include "conexao.php";
    $e = new conexao();
    $consulta = $e->executarNoBanco("SELECT * FROM tab_eventos"); 

    foreach ($consulta as $key => $value) {
            $vetor[] = $value;
     } 
     
    //Passando vetor em forma de json
    
    echo json_encode($vetor);
    
?>