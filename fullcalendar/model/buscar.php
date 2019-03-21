<?php 
    
    // require_once('Class/class.gn_tabela.php');
    include "conexao.php";
    
    class buscar extends conexao {

        function __construct() {

        }

        public function getClientes(){
            $SQL = "SELECT Cli_Cod,Cli_Nome  FROM tab_clientes WHERE CLI_STATUS='on' order by Cli_Nome " ; 
            $exec = $this->executarNoBanco($SQL);

            foreach ($exec as $key => $value) {
                $arr[] = $value;
            }


        
            return json_encode($arr);
            //Conectando ao banco de dados
            
            
        }

        public function getProfissionais(){
            $SQL = "SELECT Prof_Nome, Prof_Cod  FROM tab_Profissionais WHERE PROF_STATUS='on' order by Prof_Nome" ; 
            $exec = $this->executarNoBanco($SQL);

        
            return $exec;
            //Conectando ao banco de dados
            
            
        }

        public function getConsultas(){
            $SQL = "SELECT CONS_COD, CONS_DESC, CONS_VALOR, CONS_TEMPO  FROM tab_tpConsulta order by CONS_VALOR" ; 
            $exec = $this->executarNoBanco($SQL);

        
            return $exec;
            //Conectando ao banco de dados
            
            
        }

        public function getSalas(){
            $SQL = "SELECT SALA_DESC,SALA_COD FROM tab_salas " ; 
            $exec = $this->executarNoBanco($SQL);

        
            return $exec;
            //Conectando ao banco de dados
            
            
        }
                        
    }   
        
?>