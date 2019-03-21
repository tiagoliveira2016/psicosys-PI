<?php 
        date_default_timezone_set('America/Sao_Paulo');
        include "conexao.php";
       
        $e = new conexao();
        $cli      = $_GET["cli"];
        $idprof   = $_GET["prof"];
        $data     = $_GET["dataini"];
        $idTpDta  = $_GET["datafim"];
        $sala     = $_GET["sala"];

        //traz quantidade em minutos para somar
        $sql1 = "SELECT CONS_TEMPO FROM Tab_tpConsulta WHERE CONS_COD = $idTpDta limit 1";
        $aux = $e->executarNoBanco($sql1);
        foreach ($aux as $key => $value) {
            $datafim = $value ["CONS_TEMPO"];
        }
        
        //Calculo de data fim, 30 ou 60 minutos de consulta.
        $dtfim_soma = date( "Y-m-d H:i:s", strtotime($data)+(60*($datafim)) );


        //nome cliente para salvar no banco        
        $sql = "SELECT Cli_Nome FROM tab_Clientes WHERE Cli_Cod = $cli limit 1";
        $nmcli = $e->executarNoBanco($sql);
        foreach ($nmcli as $key => $value) {
            $nm = $value['Cli_Nome'];
        }


       ///Verificar se existe evento cadastrado para Profissional no horario informado
        $ev = "SELECT id FROM tab_eventos 
                WHERE start <= '$data' 
                AND  end >= '$data' 
                AND PROF_ID = '$idprof'
                AND SALA_ID = $sala
                AND STATUS = 'A'
               ";
        $ex = $e->executarNoBanco($ev);
        
       // var_dump($data < date('Y/m/d').' '.date('H:i'));
        //Já existe evento no horario informado para o colaborador informado
        
        if($ex->num_rows > 0)
            echo"2";
        elseif($data < date('Y/m/d H:i'))
            echo "3";
        else{   
            $query = "INSERT INTO tab_eventos (status,title,cli_id ,prof_id,start, end, id_tpconsulta , sala_id) 
            VALUES                           ('A','$nm',$cli,$idprof, '$data','$dtfim_soma',$idTpDta, $sala)";

            $exec = $e->executarNoBanco($query);                         
        
            //Gravado com sucesso
            if($exec)            
                echo "1";     
            
            //Erro 
            else
                echo "0";
            

        }

        
       	
        
?>