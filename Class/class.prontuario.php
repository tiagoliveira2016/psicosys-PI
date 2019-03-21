<?php

// DOCUMENTADO EM CLASS.CONVENIO.PHP

require_once('Class/class.gn_tabela.php');

class prontuario extends gn_tabela 
{
    function __construct(){
        
        parent::__construct();
        
        $this->classe = "prontuario";
        
        $this->tabela = "tab_prontuarios";
    
        $this->chave = "Pron_Id";
        
        $this->campos = array(
            "Pron_Profissional" => array(
                "tagname"   => "input",
                "class"     => 'form-control ' ,
                "banco"     => "Pron_Profissional",
                "id"        => "Pron_Profissional",
                "label"     => "Profissional",
                // "orderBy"   => true, //?? Pendente
                "required"  => true,
                "pesquisa"  => true,
                "readonly"  => true,
                "tamanho"   => 5,
                "value"     => $_SESSION['login']
            ),
            "pron_IdProf" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "pron_IdProf",
                "id"       => "pron_IdProf",
                "label"    => "Id Prof.",
                "pesquisa" => false,
                "readonly"  => true,
                "tamanho"  => 1,
                'style'    => 'visible:false',
                'value'    => $_SESSION['id'] 
            ),
            "Pron_Cliente" => array(
                "tagname"      => "select",
                "class"        => 'form-control ',
                "type"         => "db",
                "banco"        => "Pron_Cliente",
                "id"           => "Pron_Cliente",
                "label"        => "Cliente",
                "custonSelect" => "Pron_Cliente",
                "custonFrom"   => "LEFT OUTER JOIN tab_clientes ON (tab_clientes.Cli_Cod = tab_prontuarios.Pron_Cliente)",
                "SQL"          => "SELECT Cli_Cod, Cli_Nome from tab_clientes",
                "SELECT_VALUE" => 'Cli_Cod' ,
                "SELECT_NAME"  => 'Cli_Nome',
                "pesquisa"     => true,
                "tamanho"      => 5,
                "callback" => "lista_callback_cliente"
            ),
            
            "Pron_DataHora" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Pron_DataHora",
                "id"       => "Pron_DataHora",
                "label"    => "Data e Hora",
                "pesquisa" => true,
                "readonly" => true,
                "callback" => "lista_callback_data",
                "tamanho"  => 5,
                "value"    => date('Y-m-d H:i')
            ),
            "Pron_Desc" => array(
                "tagname"  => "textarea",
                "class"    => 'form-control ' ,
                "banco"    => "Pron_Desc",
                "id"       => "Pron_Desc",
                "label"    => "Prontuário",
                'style'    => 'height:290px',
                "pesquisa" => true,
                "tamanho"  => 12,
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

        if ($valor == "0000-00-00" || $valor == "0000-00-00 00:00:00" || empty($valor)  ){
            return "";
        }
        
        return date( 'd/m/Y', strtotime( $valor ) ) ; 
    }


    function lista_callback_cliente($valor)
    {
            $SQL = "SELECT CLI_NOME FROM Tab_Clientes WHERE Cli_Cod = ".$valor;
            $a = $this->getOne($SQL);
        // var_dump($a);
            return $a['CLI_NOME'];
        
    }



    
}
