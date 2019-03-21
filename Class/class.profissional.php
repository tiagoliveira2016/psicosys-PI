<?php

// DOCUMENTADO EM CLASS.PROFISSIONAL.PHP

require_once('Class/class.gn_tabela.php');

class profissional extends gn_tabela 
{
    function __construct(){
        
        parent::__construct();
        
        $this->classe = "profissional";
        
        $this->tabela = "tab_profissionais";
        
        $this->chave = "Prof_Cod";
        
        $this->campos = array(
            "Prof_Nome" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Prof_Nome",
                "id"       => "Prof_Nome",
                "label"    => "Nome",
                "orderBy"  => true, //?? Pendente
                "type"     => "text",
                "required" => true,
                "pesquisa" => true,
                "tamanho"  => 6,
            ),
            "Prof_Status" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Prof_Status",
                "id"       => "Prof_Status",
                "label"    => "Status ",
                "callback" => "lista_callback_check",
                "type"     => "checkbox",
                // "checked"  => true, // ?? para sempre vir checado
                "pesquisa" => true,
                "tamanho"  => 1,
                "data-toggle"=>"toggle",
                "data-onstyle" =>"success",
                "data-offstyle"=>"danger",
                "data-on"=>"Ativo",
                "data-off"=>"Inativo"


                // "data-height"=>"50"
            ),
            "Prof_Especialidade" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Prof_Especialidade",
                "id"       => "Prof_Especialidade",
                "label"    => "Especialidade",
                "type"     => "text",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 6,
            ),
            "Prof_Cnpj_Cpf" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcpf' ,
                "banco"    => "Prof_Cnpj_Cpf",
                "id"       => "Prof_Cnpj_Cpf",
                "label"    => "CPF",
                "type"     => "text",
                "required" => true,
                "pesquisa" => false,
                "tamanho"  => 6,
            ),
            "Prof_Tipo" => array( 
                "tagname"  => "select",
                "class"    => 'form-control selectmultiple' ,
                "banco"    => "Prof_Tipo_Crianca",
                 "id"      => "Prof_Tipo_Crianca",
                "label"    => "Preferencialmente",
                "pesquisa" => false,
                // "multiple" =>"select",
                "tamanho"  => 6,
                'options'=> array(
                    'Crianca'    => "Criança"     ,       
                    'Adolescente'=> "Adolescente" ,           
                    'Adulto'     => "Adulto"      ,       
                    'Idoso'      => "Idoso"       ,   
                ),
            ),

            "Prof_Data_Nasc" => array(
                "tagname"  => "input",
                "class"    => 'form-control datepicker ' ,
                "banco"    => "Prof_Data_Nasc",
                "id"       => "Prof_Data_Nasc",
                "label"    => "Data Nascimento",
                "callback" => "lista_callback_data",
                "type"     => "date",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
                "onchange" => "calcYearOld(this, \"Prof_Idade\");",
            ),
            "Prof_Idade" => array(
                "tagname"        => "input",
                "class"          => 'form-control ' ,
                "banco"          => "Prof_Idade" ,
                "id"             => "Prof_Idade" ,
                "label"          => "Idade",
                "type"           => "text",
                "pesquisa"       => false,
                "disabled"       => true,
                "gravar"         => false,
                "tamanho"        => 3,
                "custonSelect"   => "
                    CASE
                        WHEN Prof_Data_Nasc <> '0000-00-00' 
                        THEN (SELECT YEAR(CURRENT_TIMESTAMP) - YEAR(Prof_Data_Nasc) - 
                            (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(Prof_Data_Nasc, 5))) 
                        ELSE NULL
                    END Prof_Idade",
            ),
            "Prof_Endereco" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Prof_Endereco",
                "id"       => "Prof_Endereco",
                "label"    => "Endereço",
                "type"     => "text",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
            ),
            "Prof_Cep" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcep ' ,
                "banco"    => "Prof_Cep",
                "id"       => "Prof_Cep",
                "label"    => "CEP",
                "type"     => "text",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Prof_Fone1" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskfone' ,
                "banco"    => "Prof_Fone1",
                "id"       => "Prof_Fone1",
                "label"    => "Fone(1)",
                "type"     => "text",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Prof_Fone2" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskfone' ,
                "banco"    => "Prof_Fone2",
                "id"       => "Prof_Fone2",
                "label"    => "Fone(2)",
                "type"     => "text",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Prof_Cel1" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcel ' ,
                "banco"    => "Prof_Cel1",
                "id"       => "Prof_Cel1",
                "label"    => "Celular(1)",
                "type"     => "text",
                "pesquisa" => true,
                "required" => true,
                "tamanho"  => 3,
            ),
            "Prof_Cel2" => array(
                "tagname"  => "input",
                "class"    => 'form-control maskcel ' ,
                "banco"    => "Prof_Cel2",
                "id"       => "Prof_Cel2",
                "label"    => "Celular(2)",
                "type"     => "text",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Prof_Convenio" => array(
                "tagname"      => "select",
                "class"        => 'form-control ' ,
                "type"         => "db",
                "banco"        => "Prof_Convenio",
                "id"           => "Prof_Convenio",
                "label"        => "Convênio",
                "custonSelect" => "tab_convenios.Conv_Nome",
                "custonFrom"   => "LEFT OUTER JOIN tab_convenios ON (tab_convenios.Conv_Cod = tab_Profissionais.Prof_Convenio)",
                "SQL"          => "SELECT Conv_Cod, Conv_Nome from tab_convenios",
                "SELECT_VALUE" => 'Conv_Cod' ,
                "SELECT_NAME"  => 'Conv_Nome',
                "pesquisa"     => false,
                "tamanho"      => 3,
            ),
            "Prof_Conselho" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Prof_Conselho",
                "id"       => "Prof_Conselho",
                "label"    => "Conselho",
                "type"     => "text",
                "pesquisa" => false,
                "required" => true,
                "tamanho"  => 3,
            ),
            "Prof_Email" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Prof_Email",
                "id"       => "Prof_Email",
                "label"    => "E-mail",
                "type"     => "text",
                "pesquisa" => true,
                "tamanho"  => 3,
            ),
            "Prof_Obs" => array(
                "tagname"  => "input",
                "class"    => 'form-control ' ,
                "banco"    => "Prof_Obs",
                "id"       => "Prof_Obs",
                "label"    => "Observação",
                "type"     => "textarea",
                "pesquisa" => false,
                "tamanho"  => 3,
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
                "readonly" => true,
                "callback" => "lista_callback_data",
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
        if ($valor == "0000-00-00" || $valor == "0000-00-00 00:00:00"  || empty($valor) ){
            return "";
        }
        
        return date( 'd/m/Y', strtotime( $valor ) ) ; 
    }
    
    
    function getJavascript(){
        return "
            var calcYearOld = function(birthday, target)
            {
                var date1 = birthday.valueAsDate;
                var date2 = new Date();
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());
                var diffDays = Math.ceil(timeDiff / (1000 * 60 * 60 * 24 * 365)); 
                diffDays = diffDays > 1 ? diffDays -1 : diffDays;
                document.getElementById(target).value=(diffDays);
            };
        ";
    }
}


