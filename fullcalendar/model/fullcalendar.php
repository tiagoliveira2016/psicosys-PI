<?php 
    require_once("conexao.php");
    
    class fullcalendar{
        
        public function fullcalendar(){
            $this->cadastrar();
        }    
        public function cadastrar(){      
           
            $c = new conexao();   

            // echo '<pre>';
            //    print_r('$_GET');
            echo 'oi';
            
            // $nome = $_POST["nome"];
            $nomeprof   = $_GET["idcol"];
            $nomecli    = $_GET["idcli"];
            $data       = $_GET["dataini"];
            $datafim    = $_GET["datafim"];

            
            /*$query = "INSERT INTO `tab_eventos` (`title`, `start`) VALUES ('$nome', '$data')";*/
            $query = "INSERT INTO `tab_eventos` (`title`,`prof_id`,`cli_id` ,`start`, `end`) VALUES ('$nomeprof','$nomecli', '$data',$datafim)";
            
            $exec = $this->executarNoBanco($query);                         
            
            if($exec){            
                echo "1";     
            }
            else{
                echo "0";
            }
           
        }
    }
        
?>