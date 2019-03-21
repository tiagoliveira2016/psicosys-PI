<?php

// a classe de tpConsulta nao sabe oque ela pode fazer, por isso chama a gn tabela
require_once('Class/class.gn_tabela.php');

// classe de tpConsulta recebe os metodos de gn_tabela
class tpConsulta extends gn_tabela 
{
    // construtor eh chmado automaticamente ao instanciar a classe, neste caso, o construtor de GN_TABELA apenas
    // cria as variaveis
    function __construct(){
        
        // chama o construtor do pai, o pai eh gn_tabela, que criara os campos
        parent::__construct();
        
        // nome da classe
        $this->classe = "tpConsulta";
        
        // nome da tabela
        $this->tabela = "tab_tpConsulta";
        
        // chave da tabela
        $this->chave = "CONS_COD";
        
        // campos da tabela
        $this->campos = array(
            "CONS_DESC" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "CONS_DESC",
                "id"       => "CONS_DESC",
                "label"    => "Descrição",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6
            ),
            
            "CONS_VALOR" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "CONS_VALOR",
                "id"       => "CONS_VALOR",
                "label"    => "Valor Consulta",
                "pesquisa" => true,
                "tamanho"  => 6
            ),
             "CONS_TEMPO" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "CONS_TEMPO",
                "id"       => "CONS_TEMPO",
                "label"    => "Tempo (Minutos)",
                "pesquisa" => true,
                "tamanho"  => 6
            ),
        );
        
    }

     function lista_callback_check($vl){
        //?? COMENTADO PARA EN.... O CLIENTE
        


        if ($vl == 'on'){
            $color = '#369939'    ;
            // $char  = "&#9745;"  ;
            $char = '<i class="fas fa-check-circle"></i>';
            $this->status = true;

            
        } else {
           $color = '#b22222'      ;
           $char = '<i class="fas fa-times-circle"></i>';
           $this->status = false;
           
        }
        
        
        return "
            <span 
                style='
                    font-size : 30px;
                    color     : $color;
                '>
                $char
            </span>
        ";
    }
    
    
}
