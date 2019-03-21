<?php 
        include "conexao.php";
        // $this->ver($_POST);
        $id   = $_GET['id'];  
        
        $query = "DELETE FROM tab_eventos WHERE id = $id";
        /*$query = "UPDATE  `tab_eventos` SET (`title`, `start`) VALUES ('$nome', '$data')";*/
         
        // print_r($query);
        $e = new conexao();
        $exec = $e->executarNoBanco($query);                         
        
        if($exec){            
            echo "1";     
        }
        else{
            echo "0";
        }
       
        
?>