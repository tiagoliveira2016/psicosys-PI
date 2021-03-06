<?php

// a classe de usuario nao sabe oque ela pode fazer, por isso chama a gn tabela
require_once('Class/class.gn_tabela.php');

// classe de usuario recebe os metodos de gn_tabela
class sala extends gn_tabela 
{
    // construtor eh chmado automaticamente ao instanciar a classe, neste caso, o construtor de GN_TABELA apenas
    // cria as variaveis
    function __construct(){
        
        // chama o construtor do pai, o pai eh gn_tabela, que criara os campos
        parent::__construct();
        
        // nome da classe
        $this->classe = "sala";
        
        // nome da tabela
        $this->tabela = "tab_salas";
        
        // chave da tabela
        $this->chave = "sala_cod";
        
        // campos da tabela
        $this->campos = array(
            "sala_desc" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "sala_desc",
                "id"       => "sala_desc",
                "label"    => "Descrição",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 12,
            ),
            "criado_em" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "criado_em",
                "id"       => "criado_em",
                "label"    => "Criado Em",
                "pesquisa" => true,
                "callback" => "lista_callback_data",
                "readonly" => true,
                "tamanho"  => 6,
            ),

            "usuario_cri" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "usuario_cri",
                "id"       => "usuario_cri",
                "label"    => "Usuario Criação",
                "pesquisa" => true,
                "readonly" => true,
                "tamanho"  => 6,
            ),

            "alterado_em" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "alterado_em",
                "id"       => "alterado_em",
                "label"    => "Alterado Em",
                "pesquisa" => true,
                "callback" => "lista_callback_data",
                "readonly" => true,
                "tamanho"  => 6,
            ),

            "usuario_alt" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "usuario_alt",
                "id"       => "usuario_alt",
                "label"    => "Usuario Alteração",
                "pesquisa" => true,
                "readonly" => true,
                "tamanho"  => 6,
            ),

        );
        
    }

     function lista_callback_check($vl){
        //?? COMENTADO PARA EN.... O CLIENTE
        
        $char =  "<i class='fas fa-circle'></i>";

        if ($vl == 'on'){
            $color = '#369939'    ;
            $this->status = true;

            
        } else {
           $color = '#b22222'      ;
           $this->status = false;
           
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
        if ($valor == "0000-00-00" || $valor == "0000-00-00 00:00:00"  || empty($valor) ){
            return "";
        }
        
        return date( 'd/m/Y', strtotime( $valor ) ) ; 
    }
    
}
