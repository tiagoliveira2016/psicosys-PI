<?php

// a classe de usuario nao sabe oque ela pode fazer, por isso chama a gn tabela
require_once('Class/class.gn_tabela.php');

// classe de usuario recebe os metodos de gn_tabela
class consulta extends gn_tabela 
{
    // construtor eh chmado automaticamente ao instanciar a classe, neste caso, o construtor de GN_TABELA apenas
    // cria as variaveis
    function __construct(){
        
        // chama o construtor do pai, o pai eh gn_tabela, que criara os campos
        parent::__construct();
        
        // nome da classe
        $this->classe = "Consulta";
        
        // nome da tabela
        $this->tabela = "tab_eventos";
        
        // chave da tabela
        $this->chave = "id";
        
        // campos da tabela
        $this->campos = array(
            "STATUS" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "STATUS",
                "id"       => "STATUS",
                "label"    => "Status",
               "callback"      => "lista_callback_check",
                "pesquisa" => true,
                "required" => false,
                "tamanho"  => 6
            ),
            "title" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "title",
                "id"       => "title",
                "label"    => "Cliente",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6
            ),
            /* "prof_id" => array(
                "tagname"      => "select",
                "class"        => 'form-control ' ,
                "type"         => "db",
                "banco"        => "prof_id",
                "id"           => "prof_id",
                "label"        => "Profissional",
                // "custonSelect" => "tab_convenios.Conv_Nome",
                // "custonFrom"   => "LEFT OUTER JOIN tab_convenios ON (tab_convenios.Conv_Cod = tab_Profissionais.prof_id)",
                "SQL"          => "SELECT PROF_NOME from tab_Profissionais WHERE id= 1",
                // "SELECT_VALUE" => 'Conv_Cod' ,
                // "SELECT_NAME"  => 'Conv_Nome',
                "pesquisa"     => true,
                "tamanho"      => 3,
            ),*/

            "start" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "start",
                "id"       => "start",
                "label"    => "Data Consulta",
                "callback" => "lista_callback_data",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6
            ),
             "end" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "end",
                "id"       => "end",
                "label"    => "Fim consulta",
                "callback" => "lista_callback_data",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6
            ),
           "prof_id" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "prof_id",
                "id"       => "prof_id",
                "label"    => "Profissional",
                "pesquisa" => false,
                "required" => true,
                "tamanho"  => 6
            ),

        );
        
    }

      function lista_callback_check($vl){
        //?? COMENTADO PARA EN.... O CLIENTE
        // var_dump($vl);
        $char =  "<i class='fas fa-circle'></i>";
        
        if ($vl == 'A'){
            $color = '#4c6ca0'    ;    
        } 
        elseif($vl == 'D') {
           $color = '#ff4945'      ;
        }
        elseif($vl == 'F') {
           $color = '#8b2e0f';
        }
        else{
           $color = '#369939' ;
        }
        
        
        return "
            <span  
                style='
                    font-size : 20px;
                    color     : $color;
                '>
                $char
            </span>
        ";
    }

    function lista_callback_data($valor)
    {
        if ($valor == "0000-00-00" || $valor == "0000-00-00 00:00:00" || empty($valor)  ){
            return "";
        }
        
        return date( 'd/m/Y H:i', strtotime( $valor ) ) ; 
    }
    
    
    
}
