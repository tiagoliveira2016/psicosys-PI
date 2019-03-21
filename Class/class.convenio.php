<?php

// DOCUMENTADO EM CLASS.CONVENIO.PHP

require_once('Class/class.gn_tabela.php');

class convenio extends gn_tabela 
{
    function __construct(){
        
        parent::__construct();
        
        $this->classe = "convenio";
        
        $this->tabela = "tab_convenios";
    
        $this->chave = "Conv_Cod";
        
        $this->campos = array(
            "Conv_Nome" => array(
                "tagname"   => "input",
                "class"     => 'form-control ' ,
                "banco"     => "Conv_Nome",
                "id"        => "Conv_Nome",
                "label"     => "Convênio",
                "orderBy"   => true, //?? Pendente
                "required"  => true,
                "pesquisa"  => true,
                "tamanho"   => 6,
            ),
            "Conv_Status" => array(
                "tagname"    => "input",
                "class"      => 'form-control checkbox' ,
                "banco"      => "Conv_Status",
                "id"         => "Conv_Status",
                "callback"   => "lista_callback_check",
                "label"      => "Status",
                "type"       => "checkbox",
                // "checked"    => true, // ?? para sempre vir checado
                // "required"   => false,
                "pesquisa"   => true,
                "tamanho"    => 1,
                 "data-toggle"=>"toggle",
                "data-onstyle" =>"success",
                "data-offstyle"=>"danger",
                "data-on"=>"Ativo",
                "data-off"=>"Inativo"
            ),
            "Conv_Cnpj" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcnpj' ,
                "banco"    => "Conv_Cnpj",
                "id"       => "Conv_Cnpj",
                "label"    => "CNPJ",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6,
            ),
            "Conv_Email" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Conv_Email",
                "id"       => "Conv_Email",
                "label"    => "E-mail",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6,
            ),
            "Conv_Endereco" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Conv_Endereco",
                "id"       => "Conv_Endereco",
                "label"    => "Endereço",
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            "Conv_Cep" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcep' ,
                "banco"    => "Conv_Cep",
                "id"       => "Conv_Cep",
                "label"    => "CEP",
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            "Conv_Contato_Fone" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Conv_Contato_Fone",
                "id"       => "Conv_Contato_Fone",
                "label"    => "Contato",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Conv_Fone" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskfone' ,
                "banco"    => "Conv_Fone",
                "id"       => "Conv_Fone",
                "label"    => "Fone",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
            ),
            "Conv_Contato_Cel" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Conv_Contato_Cel",
                "id"       => "Conv_Contato_Cel",
                "label"    => "Contato ",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Conv_Cel" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcel' ,
                "banco"    => "Conv_Cel",
                "id"       => "Conv_Cel",
                "label"    => "Celular",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Conv_Site" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Conv_Site",
                "id"       => "Conv_Site",
                "label"    => "Site",
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            "Conv_Obs" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Conv_Obs",
                "id"       => "Conv_Obs",
                "label"    => "Observação",
                "pesquisa" => true,
                "tamanho"  => 6,
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
                "callback" => "lista_callback_data",
                "pesquisa" => true,
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

        if ($vl == 'on' || $vl == 'ON'){
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
        if ($valor == "0000-00-00" || $valor == "0000-00-00 00:00:00" || empty($valor) ){
            return "";
        }
        
        return date( 'd/m/Y', strtotime( $valor ) ) ; 
    }
    
    
}
